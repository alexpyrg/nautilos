<?php

namespace App\Livewire;

use Livewire\Component;

class FeesForm extends Component
{

    public $city_tax = '';
    public $vat = '';
    public $green_tax = '';
    protected $rules = [
        'vat' => 'required|min:0|numeric',
        'city_tax' => 'required|min:0|numeric'
    ];




    public function render()
    {
        $settingsPath = '../resources/json/settings.json';
        $jsonData = json_decode(file_get_contents($settingsPath), true);
        $this->city_tax = $jsonData['city_tax'];
        $this->vat = $jsonData['vat'];
        $this->green_tax = $jsonData['green_tax'];

        return <<<'HTML'
        <div class="inline-block">
            <form wire:submit.prevent='save' class="border-2 border-blue-700 max-w-1">
            <h2 class="font-semibold p-10 m-10 justify-self-center"> Φόρμα αλλαγής φόρων</h2>
                @csrf
                <div class="block ">
                    <label for="vat" class="block">ΦΠΑ%/VAT%: </label>
                    <input type="number" step="0.01" min="0" name="vat" placeholder="Πχ 13" wire:model="vat" value="{{ $this->vat }}">
                </div>
                <div class="block">
                    <label for="city_tax" class="block border-b border-blue-700">Δημοτικός Φόρος: </label>
                    <input type="number" step="0.01" min="0" placeholder="Πχ 0.5" name="city_tax" wire:model="city_tax" value="{{ $this->city_tax }}">
                </div>
                <button type="submit" class="p-4">Αποθήκευση</button>
            </form>
        </div>
        HTML;
    }

    public function save(){

        $settingsPath ='../resources/json/settings.json';
        $settingsJson = json_decode(file_get_contents($settingsPath), true);
        if($this->validate()){
            $settingsJson['vat'] = $this->vat;
            $settingsJson['city_tax'] = $this->city_tax;
            $settingsJson['green_tax'] = $this->green_tax;
            file_put_contents($settingsPath, json_encode($settingsJson, JSON_PRETTY_PRINT));
        }

        return $this->redirect('/easyupdate');
    }



}
