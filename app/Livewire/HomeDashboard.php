<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class HomeDashboard extends Component
{


    public function render()
    {
        if(!Auth::check()){
            return redirect()->route('login');
        }
        return view('livewire.home-dashboard');
    }
}
