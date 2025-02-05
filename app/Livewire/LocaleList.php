<?php

namespace App\Livewire;

use App\Models\Locale;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class LocaleList extends Component
{
    public function render()
    {
        return view('livewire.locale-list')->with([
            'locales' => Locale::all(),

        ])->layout('layouts.cms');
    }

    public function createLocale(){
        if(Auth::check()){
            return redirect('/admin/pages/locales/create');
        }else{
            return redirect('/');
        }
    }
}
