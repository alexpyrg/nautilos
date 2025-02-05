<?php

namespace App\Livewire;

use App\Models\roomType;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class RoomsDashboard extends Component
{
    public $rooms;
    public function render()
    {
        $this->rooms = roomType::all();
        return view('livewire.rooms-dashboard');
    }

    public function createRoom(){
        if(!Auth::check()){
            return $this->redirect('/')->with('error', 'Could not verify identity!');
        }else{
            return $this->redirect('/easyupdate/hotel/room/new');
        }

    }
}
