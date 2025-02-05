<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserAuthRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redirect;

class AuthController extends Controller
{
//    public function authenticate(UserAuthRequest $request){
//        try{
//            $request->validate([
//                'username' => 'required',
//                'password' => 'required'
//            ]);
//
//        }catch (\Exception $ex)
//        {
//            return Redirect::back()->withErrors($ex->getMessage());
//        }
//        if(!$request->validated()){
//            return Redirect::back()->withErrors('username', 'Το όνομα χρήστη ή ο κωδικός πρόσβασης δεν ήταν σωστά!');
//        }else{
//            $username = $request->input('username');
//            $password = $request->input('password');
//            if(Auth::attempt(
//                [
//                    'username' => $username,
//                    'password' => $password
//                ]
//            )){
//                $request->session()->regenerate();
//                return redirect()->intended(route('dashboard.load'));
////                return redirect()->route('dashboard.load');
//            }else{
//                return back()->withErrors('username', 'Το όνομα χρήστη ή ο κωδικός πρόσβασης δεν ήταν σωστά!');
//            }
//        }
//    }//authenticate

    public function authenticate(UserAuthRequest $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $username = $request->input('username');
        $ipAddress = $request->ip();

        // Cache keys to track failed attempts
        $usernameCacheKey = 'login_attempts_' . $username; // Track attempts by username
        $ipCacheKey = 'login_attempts_ip_' . $ipAddress;  // Track attempts by IP
        $blockKey = 'block_time_' . $ipAddress;  // Apply block per IP (shared across usernames)

        // Check if the user/IP is currently blocked
        if (Cache::has($blockKey)) {
            $blockTime = Cache::get($blockKey) - time();
            return back()->withErrors(['username' => "Κάνατε πολλές προσπάθειες. Προσπαθήστε ξανά σε {$blockTime} δευτερόλεπτα."]);
        }

        if (Auth::attempt(['username' => $username, 'password' => $request->input('password')])) {
            // Login successful: Clear failed attempts for both username and IP
            Cache::forget($usernameCacheKey);
            Cache::forget($ipCacheKey);
            Cache::forget($blockKey); // Clear block state
            $request->session()->regenerate();

            return redirect()->intended(route('dashboard.load'));
        } else {
            // Increment failed attempts for both username and IP
            $usernameAttempts = Cache::get($usernameCacheKey, 0) + 1;
            $ipAttempts = Cache::get($ipCacheKey, 0) + 1;

            // Update cache with incremented values
            Cache::put($usernameCacheKey, $usernameAttempts, 3600); // Store attempts by username (1 hour)
            Cache::put($ipCacheKey, $ipAttempts, 3600); // Store attempts by IP (1 hour)

            // Evaluating combined or individual attempt limits
            $totalAttempts = max($usernameAttempts, $ipAttempts);

            // Apply rate-limiting logic
            if ($totalAttempts == 3) {
                // Block for 5 minutes
                Cache::put($blockKey, time() + 300, 300);
                return back()->withErrors(['username' => 'Κάνατε πολλές προσπάθειες. Προσπαθήστε ξανά σε 5 λεπττά.']);
            } elseif ($totalAttempts == 7) {
                // Block for 15 minutes
                Cache::put($blockKey, time() + 900, 900);
                return back()->withErrors(['username' => 'Κάνατε πολλές προσπάθειες. Προσπαθήστε ξανά σε 15 λεπτά.']);
            } elseif ($totalAttempts >= 10) {
                // Block for 1 hour
                Cache::put($blockKey, time() + 3600, 3600);
                return back()->withErrors(['username' => 'Κάνατε πολλές προσπάθειες. Προσπαθήστε ξανά σε 1 ώρα.']);
            }

            return back()->withErrors(['username' => 'Τα στοιχεία που δώσατε είναι λάθος.']);
        }
    }


    public function logout(Request $request){
        if(Auth::check()){
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect('/');
        }//if

        return redirect('/');
    }//logout

    public function authenticateForm(){
        return view('livewire.cms-login');
    }//authenticateForm

}//AuthController
