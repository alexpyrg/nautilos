<?php

namespace App\Http\Controllers;

use App\Models\roomType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoomsRates extends Controller
{
    public function loadRoomsRatesForm(){
        return view('roomsRates');
    }

    public function deleteRoom(Request $request)
    {
        if(Auth::check()){
            try{
            roomType::where('id',$request->id)->delete();
            }catch(\Exception $ex){
                dd($ex);
                return redirect()->back()->with('error', 'Δε μπορέσαμε να διαγράψουμε αυτό το δωμάτιο!');
            }

            return redirect()->back()->with('success', 'Το δωμάτια διαγράφτηκε επιτυχώς!');
        }
    }
}
