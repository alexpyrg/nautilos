<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CmsLogin extends Component
{
    #[Validate('required', message: 'Πρέπει εισάγετε το όνομα χρήστη!')]
    public $username = '';

    #[Validate('required', message: 'Πρέπει να εισάγετε τον κωδικό πρόσβασης!')]
    public $password = '';

    public function cancelSub(){
        return redirect()->to('/');
    }//if user click cancel submit

    public function authenticate(){
    //prevent submit -> validate here!
    // if it passed validation then redirect the user and send to controller.
    // and then the controller has the control over the user data and it's not up to the component anymore!
        $this->validate($this->only(['username', 'password']));
        $credentials = $this->validate($this->only(['username', 'password']));

        if(!Auth::attempt($this->only(['username', 'password']))){
            $this->addError('username', 'Λάθος όνομα χρήστη η κωδικός πρόσβασης!');
        }else{
            session()->regenerate();
            session()->flash('What are you doing?');
            return redirect('/easyupdate/mailing/template')->with('success', 'Συνδεθήκατε επιτυχώς!');

        }//if

      $this->addError('username', 'Other error occurred!');


    }//authenticate

    public function render()
    {
        return view('livewire.cms-login');
    }
}
