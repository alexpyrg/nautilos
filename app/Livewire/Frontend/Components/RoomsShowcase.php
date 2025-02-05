<?php

namespace App\Livewire\Frontend\Components;

use App\Models\CardWidget;
use App\Models\CardWidgetsContent;
use App\Models\Locale;
use App\Models\MonthlyRate;
use App\Models\Page;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\File;
use Livewire\Component;

class RoomsShowcase extends Component
{

    public $selected_locale;
    public function render()
    {

        $this->selected_locale = Locale::where('code', app()->getLocale())->first();
        $cards = CardWidget::with('contents')->orderBy('order')->get();
        $this->cardsContent = CardWidgetsContent::all();

// Fetch the minimum non-zero rate for each room_type_id
        $monthlyRates = MonthlyRate::select('room_type_id', \DB::raw('MIN(CASE WHEN rate > 0 THEN rate ELSE NULL END) as min_rate'))
            ->groupBy('room_type_id')
            ->get()
            ->keyBy('room_type_id'); // Group by room_type_id for easy lookup

// Fetch translations
        $res = File::get(resource_path('translations/reservation_'. App::getLocale() .'.json'));
        if(!$res){
            $res = File::get(resource_path('translations/reservation_en.json'));
        }
        $res = json_decode($res, true);
        $gt = File::get(resource_path('translations/generalTexts_'. App::getLocale() .'.json'));
        if(!$gt){
            $gt = File::get(resource_path('translations/generalTexts_en.json'));
        }
        $gt = json_decode($gt, true);


        return view('livewire.Frontend.components.rooms-showcase',compact('gt','res','cards', 'monthlyRates'));
    }
}
