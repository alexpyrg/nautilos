<?php

namespace App\Livewire;

use App\Models\Locale;
use Illuminate\Support\Facades\File;
use Livewire\Component;

class TopBar extends Component
{
    public function render()
    {
        $tb = null;
        if(File::exists(resource_path('translations/topbar_'. app()->getLocale() .'.json'))){
            $tb = json_decode(File::get(resource_path('translations/topbar_'. app()->getLocale() .'.json')));
        }else{
            $tb = json_decode(File::get(resource_path('translations/topbar_en.json')));
        }
        return view('livewire.top-bar')->with([
            'locales' => Locale::all()->sortBy('order'),
            'tb' => $tb,
        ]);
    }
}
