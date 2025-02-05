<?php

namespace App\Livewire;

use App\Models\roomType;
use Livewire\Component;

class RoomEditForm extends Component
{
    public $id;

    public $name;
    public $number;
    public $independent;
    public $bathroom;
    public $kitchen;
    public $parking;
    public $is_available;
    public $is_independent;
    public $max_occupants;

    public $room;
    protected $rules = [
        'name' => 'required',
        'number' => 'required|numeric|min:1',
        'max_occupants'=>'required|numeric|min:1'
    ];
    protected $messages = [
        'name.required' => 'Το όνομα δωματίου δε μπορεί να είναι κενό!',
        'number.required' => 'Ο αριθμός δωματίων πρέπει να είναι τουλάχιστον 1!',
        'max_occupants.required' => 'Τα άτομα που φιλοξενεί το δωμάτιο πρέπει να είναι τουλάχιστον 1!',
        'number.min' => 'Ο αριθμός δωματίων πρέπει να είναι τουλάχιστον 1!',
        'max_occupants.min' => 'Τα άτομα που φιλοξενεί το δωμάτιο πρέπει να είναι τουλάχιστον 1!',

    ];
    public function mount($id){
        $this->id = $id;
    }

    public function save(){

        if($this->validate()){
            try{
                $this->room->name = $this->name;
                $this->room->number = $this->number;
                $this->room->is_available = $this->is_available;
                $this->room->max_occupants = $this->max_occupants;
                $this->room->bathroom = $this->bathroom;

                $this->room->save();
//                request()->session()->flash('success', 'Οι αλλαγές αποθηκεύτηκαν επιτυχώς!');
                return redirect('/easyupdate/hotel/rooms')->with('success', 'Οι αλλαγές αποθηκεύτηκαν επιτυχώς!');
            }catch(\Exception $ex){
                session()->flash('error', 'Error: $ex');
            }
        }else{
            session()->flash('error', 'Οι αλλαγές δεν αποθηκεύτηκαν! Παρακαλώ ελέγξτε τα στοιχεία!');
        }

       session()->flash('error', 'Οι αλλαγές δεν αποθηκεύτηκαν! Παρακαλώ ελέγξτε τα στοιχεία!');
    }

    public function render()
    {
        $this->room = roomType::find($this->id);
        $room = $this->room; //or just add $this-> in front of all $room->xxxxxxx
        if($room->is_available === 1){
        $this->is_available = true;
        }else{
            $this->is_available = false;
        }

        if($room->is_independent){
            $this->is_independent = true;
        }else{
            $this->is_independent = false;
        }
        $this->bathroom = $room->bathroom;
        $this->number = $room->number;
        $this->name = $room->name;
        $this->max_occupants = $room->max_occupants;

        return view('livewire.room-edit-form');
    }
}
