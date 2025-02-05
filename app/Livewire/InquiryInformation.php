<?php

namespace App\Livewire;

use App\Models\Locale;
use Illuminate\Support\Facades\File;
use Livewire\Component;

class InquiryInformation extends Component
{
    public function render()
    {
        $locale = Locale::where('code', app()->getLocale())->first();
        $res = File::get(resource_path('translations/reservation_'. strtolower($locale->code) . '.json'));
        if(!$res){
            $res = File::get(resource_path('translations/reservation_en.json'));
        }
        $res = json_decode($res, true);
        return view('livewire.inquiry-information')->with(compact('res'));
    }
}
