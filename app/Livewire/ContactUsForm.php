<?php

namespace App\Livewire;

use Illuminate\Support\Facades\File;
use Livewire\Component;

class ContactUsForm extends Component
{
    public $email;
    public $name;
    public $telephone;
    public $message;


    public function render()
    {
        $translations = null;
        if(File::exists(resource_path('translations/contactus_' . app()->getLocale() . '.json'))){
            $translations = File::get(resource_path('translations/contactus_' . app()->getLocale() . '.json'));
            $translations = json_decode($translations, true);
        } else{
            try{
                $translations = json_decode(file_get_contents(resource_path('translations/contactus_en.json')), true);
            }catch(\Exception $ex){
                dd($ex->getMessage());
            }//try catch
        }//if else
        return view('livewire.contact-us-form')->with(compact('translations'))->layout('layouts.main_layout');
    }//render
}
