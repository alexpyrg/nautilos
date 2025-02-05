<?php

namespace App\Livewire;

use App\Models\roomType;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Step1Form extends Component
{
    #[Validate('required')]
    public $check_in_date = '';
    #[Validate('required')]
    public $check_out_date = '';

    #[Validate('required|not_in:0')]
    public $nr_rooms = '';
    #[Validate('required|not_in:0')]
    public $room_type = '';
    public $fetched_num;

    public function next_step(){
//        dd($this->nr_rooms);
        if($this->validate()){
            try{
                session()->put('reservationData', [
                    'check_in_date' => $this->check_in_date,
                    'check_out_date' => $this->check_out_date,
                    'nr_rooms' => $this->nr_rooms,
                    'room_type' => $this->room_type
                ]);
            }catch(\Exception $ex){
                session()->flash('error', 'Error saving the data.');
            }
            return redirect()->route('reservation.new');
        }//if
    }//next_step
    public function updated(){
        $room = roomType::find($this->room_type)->toArray();
        $this->fetched_num = $room['number'];

        if($this->room_type != null && $this->room_type != 0){
            if($this->nr_rooms > $this->fetched_num){
            $this->nr_rooms = 0;
            }


        }
    }
    public function render()
    {

        return view('livewire.step1-form')->with([
            'rooms' => roomType::all(),
        ]);
    }//render
}
