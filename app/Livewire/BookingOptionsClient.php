<?php

namespace App\Livewire;

use App\Models\Locale;
use App\Models\Page;
use App\Models\PageContent;
use Illuminate\Support\Facades\File;
use Livewire\Component;

class BookingOptionsClient extends Component
{
    public function render()
    {
//        $privacy_policy_page = Page::where('name', 'Privacy Policy')->first();
//        $locale = Locale::where('code', app()->getLocale())->first();
//        $ppContent = null;
//        if(PageContent::where('page_id', $privacy_policy_page->id)->where('locale_id', $locale->id )->first()){
//        $ppContent = PageContent::where('page_id', $privacy_policy_page->id)->where('locale_id', $locale->id )->first();
//        }else{
//            $locale= Locale::where('code', 'en')->first();
//        }
//        $ppContent = PageContent::where('page_id', $privacy_policy_page->id)->where('locale_id', $locale->id )->first();
//
//        $res = File::get(resource_path('translations/reservation_'. strtolower($locale->code) . '.json'));
//
//        if(!$res){
//            $res = File::get(resource_path('translations/reservation_en.json'));
//        }
//        $res = json_decode($res, true);
//        return view('livewire.booking-options-client')->with(compact('res','privacy_policy_page', 'ppContent'));


return view('livewire.booking-options-client');
    }
}
