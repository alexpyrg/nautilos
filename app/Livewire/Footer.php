<?php

namespace App\Livewire;

use App\Models\Locale;
use App\Models\Page;
use App\Models\PageContent;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\File;
use Livewire\Component;

class Footer extends Component
{
    public function render()
    {
//        $localeId = App::getLocale();
//        $localeId = Locale::where('code', $localeId)->first()->id;
//        $fallbackLocaleId = Locale::where('code', 'en')->first()->id;
//        if(!$localeId){
//            $localeId = Locale::where('code', 'en')->first()->id;
//        }
//
//
//        // Get pages for the first <ul> element: is_hardCoded is true, or subpages of "Ierapetra"
//        $ierapetraPage = Page::where('name', 'Ierapetra')->first();
//        $firstUlPages = Page::where('parent_page', $ierapetraPage->id)
//            ->orWhereIn('id', [126, 127, 128])
//            ->with(['content' => function ($query) use ($localeId) {
//                $query->where('locale_id', $localeId);
//            }])
//            ->get();
//
//
//
//        // Get pages for the second <ul> element: is_hardCoded is false and is_subpage is false
//        $secondUlPages = Page::where('is_hardCoded', false)
//            ->where('is_subpage', false)
//            ->with(['content' => function ($query) use ($localeId, $fallbackLocaleId) {
//                if ($localeId) {
//                    $query->where('locale_id', $localeId);
//                }else{
//                $query->orWhere('locale_id', $fallbackLocaleId);
//                }
//            }])
//            ->get();
//
//        $social_buttons = null;
//        $general_texts = null;
//         if(File::exists(resource_path('translations/socialButtons_'.app()->getLocale().'.json'))){
//            $file = File::get(resource_path('translations/socialButtons_'.app()->getLocale().'.json'));
//            $social_buttons = json_decode($file, true);
//        }else{
//            $file = File::get(resource_path('translations/socialButtons_en.json'));
//            $social_buttons = json_decode($file, true);
//        }
//
//        if(File::exists(resource_path('translations/generalTexts_'.app()->getLocale().'.json'))){
//            $file = File::get(resource_path('translations/generalTexts_'.app()->getLocale().'.json'));
//            $general_texts = json_decode($file, true);
//        }else{
//            $file = File::get(resource_path('translations/generalTexts_en.json'));
//            $general_texts = json_decode($file, true);
//        }
//        $ppl = Page::where('name', 'Privacy Policy')->first();
//        $loc = Locale::where('code', app()->getLocale())->first();
//        $pplc = PageContent::where('page_id', $ppl->id)->where('locale_id', $loc->id)->first();
//        if($pplc == null){
//            $pplc = PageContent::where('page_id', $ppl->id)->where('locale_id', 'en')->first();
//        }
//        $ft = null;
////        dd($pplc);
//        if(File::exists(resource_path('translations/footer_'.app()->getLocale().'.json'))){
//            $file = File::get(resource_path('translations/footer_'.app()->getLocale().'.json'));
//            $ft = json_decode($file, true);
//        }else{
//            $file = File::get(resource_path('translations/footer_en.json'));
//            $ft = json_decode($file, true);
//        }




//        $taxi = Page::where('name', 'Taxi')->first();
//        $crete_map = Page::where('name', 'Create Map')->first();
//        $ier_map = Page::where('name', 'Ier Map')->first();
//
//        $taxi = PageContent::where('page_id', $taxi->id)->where('locale_id', $loc->id)->first();
//        $crete_map = PageContent::where('page_id', $crete_map->id)->where('locale_id', $loc->id)->first();
//        $ier_map = PageContent::where('page_id', $ier_map->id)->where('locale_id', $loc->id)->first();

//        return view('livewire.footer')->with(compact('firstUlPages',  'secondUlPages','pplc','ft','social_buttons', 'general_texts')) ;

        return view('livewire.footer');
    }
}
