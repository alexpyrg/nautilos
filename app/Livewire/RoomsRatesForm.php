<?php

namespace App\Livewire;

use App\Models\MonthlyRate;
use App\Models\roomType;
use Illuminate\Http\Request;
use Livewire\Component;
use function PHPUnit\Framework\isEmpty;

class RoomsRatesForm extends Component
{
    public $rooms;
    public $monthlyRates = [];

    protected $rules = [];
    public function render()
    {
        return view('livewire.rooms-rates-form');
    }


    public function mount()
    {
        $this->rooms = roomType::all();

        // Initialize monthlyRates with existing data or empty arrays
        foreach ($this->rooms as $room) {
            $this->monthlyRates[$room->id] = MonthlyRate::where('room_type_id', $room->id)
                ->pluck('rate', 'number')
                ->toArray();
            // Fill in missing months with 0
            for ($month = 1; $month <= 12; $month++) {
                if (!isset($this->monthlyRates[$room->id][$month])) {
                    $this->monthlyRates[$room->id][$month] = 0;
                }
            }
        }
    }
 protected function rules()
 {
     $this->rules = [];

     foreach ($this->rooms as $room) {
         foreach (range(1, 12) as $month) {
             $fieldName = "monthlyRates.{$room->id}.{$month}";
             $rules[$fieldName] = 'required|numeric|min:0';
         }
     }

     return $rules;
 }

    public function save()
    {


        foreach ($this->monthlyRates as $roomId => $rates) {
            foreach ($rates as $month => $price) {
                MonthlyRate::updateOrCreate(
                    ['room_type_id' => $roomId, 'number' => $month],
                    ['rate' => $price]
                );
            }

        }
        return session()->flash('success', 'Οι τιμές των δωματίων αποθυκεύτηκαν επιτυχώς!');
    }
}
