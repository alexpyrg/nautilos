<?php

namespace App\Livewire;

use App\Models\roomType;
use Livewire\Component;

class RoomCreationForm extends Component
{
    public $name = '';
    public $number = '';
    public $independent = true;
    public $bathroom = true;
    public $kitchen = false;
    public $parking = false;
    public $is_available = false;

    public $max_occupants = 0;


    protected $rules = [
        'name' => 'required',
        'number' => 'required',
        'max_occupants'=>'required|min:1'
    ];
    public function save(){
//        dd($this->is_available);

        if($this->validate()){

            roomType::create([
                'name'=>$this->name,
                'number'=>$this->number,
                'independent' => $this->independent,
                'max_occupants' => $this->max_occupants,
                'bathroom' => $this->bathroom,
                'parking' => $this->parking,
                'is_available' => $this->is_available
            ]);

            session()->flash('success', "Το δωμάτιο με όνομα: {$this->name} αποθηκεύτηκε!");
            return redirect('/easyupdate/hotel/rooms')->with('success', "Το δωμάτιο με όνομα: {$this->name} αποθηκεύτηκε!");
        }else{
            session()->flash('error', 'Το δωμάτιο πρέπει να έχει όνομα και αριθμό διαθέσιμων προς το κοινό!');
        }//if else
    }
    public function render()
    {
        return view('livewire.room-creation-form');
    }
}
