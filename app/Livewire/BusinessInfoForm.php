<?php

namespace App\Livewire;

use App\Models\BusinessInfo;
use Livewire\Component;

class BusinessInfoForm extends Component
{
    public $telephone = '';
    public $email = '';
    public $address = '';
    public $analytics_id = '';
    public $rate_calculation = '';
    public function render()
    {
        $busInfo = BusinessInfo::find(1);
        $this->telephone = $busInfo->phone;
        $this->email = $busInfo->email;
//        $this->address = $busInfo->address;
        $this->analytics_id = $busInfo->analytics_id;
//        $this->rate_calculation = $busInfo->rate_calculation;
        return view('livewire.business-info-form');
    }

    protected $rules = [
        'phone' => 'required',
        'email' => 'required',
        'address' => 'required',
    ];
    public function save(){

    }
}
