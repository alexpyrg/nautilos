<?php

namespace App\Livewire;

use App\Models\Locale;
use Livewire\Component;

class LocaleCreationForm extends Component
{
    public $name = '';
    public $code = '';

    protected $rules = [
      'name' => 'required',
      'code' => 'required'
    ];
    public function save(){

        $rules = [
            'name' => 'required',
            'code' => 'required'
        ];
        if($this->validate($rules)){
            try{
            Locale::create(
                [
                    'name' => $this->name,
                    'code' => $this->code
                ]

            );
             return session()->flash('success', "Η γλώσσα {$this->name} καταχωρήθηκε επιτυχώς!");
            }catch (\Exception $ex){
                dd($ex);
              return session()->flash('error', 'Πρέπει να συμπληρωθούν όλα τα κενά!');
            }
        }//if

        return session()->flash('error', 'Ωχ! Κάτι πήγε λάθος.');
    }

    public function render()
    {

        return view('livewire.locale-creation-form');
    }
}
