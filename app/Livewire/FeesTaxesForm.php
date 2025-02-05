<?php

namespace App\Livewire;

use Livewire\Component;

class FeesTaxesForm extends Component
{
    public $city_tax = '';
    public $vat = '';
    public $green_tax = '';
    protected $rules = [
        'vat' => 'required|min:0|numeric',
        'city_tax' => 'required|min:0|numeric'
    ];
    public function cancel()
    {

    }

    public function render()
    {
        $settingsPath = '../resources/json/settings.json';
        $jsonData = json_decode(file_get_contents($settingsPath), true);
        $this->city_tax = $jsonData['city_tax'];
        $this->vat = $jsonData['vat'];
        $this->green_tax = $jsonData['green_tax'];

        return view('livewire.fees-taxes-form');
    }

    public function save(){

        $settingsPath ='../resources/json/settings.json';
        $settingsJson = json_decode(file_get_contents($settingsPath), true);
        if($this->validate()){
            try {


            $settingsJson['vat'] = $this->vat;
            $settingsJson['city_tax'] = $this->city_tax;
            $settingsJson['green_tax'] = $this->green_tax;
            file_put_contents($settingsPath, json_encode($settingsJson, JSON_PRETTY_PRINT));
            }catch(\Exception $ex){
                session()->flash('error', 'Please contact the developer immediatelly!With code: FTF-200-0424');
            }//try catch
            finally{
               return redirect()->to(URL::base);
            }
        }

        return $this->redirect('/easyupdate');
    }
}
