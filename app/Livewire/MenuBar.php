<?php

namespace App\Livewire;

use App\Models\Locale;
use App\Models\Page;
use App\Models\PageContent;
use Livewire\Component;

class MenuBar extends Component
{





    public function render()
    {
        // Get all subpages and top-level pages
        $subpages = Page::where('is_subpage', '1')->get();
        $pages = Page::where('is_subpage', '0')->get();

        // Get the current locale and fallback locale
        $locale = Locale::where('code', app()->getLocale())->firstOrFail();
        $localeFB = Locale::where('code', 'en')->firstOrFail(); // Fallback to English

        // Get page content for current locale and fallback locale
        $pageContent = PageContent::where('locale_id', $locale->id)->get();
        $pageContentFB = PageContent::where('locale_id', $localeFB->id)->get();

        // Sort pages and subpages by 'order'
        $pages = $pages->sortBy('order');
        $subpages = $subpages->sortBy('order');



        // Pass necessary data to the view
        return view('livewire.menu-bar', [
            'subpages' => $subpages,
            'pages' => $pages,
            'pageContent' => $pageContent,
            'pageContentFB' => $pageContentFB,
            'currentLocale' => $locale->code, // Pass current locale to the Blade template
            'locale'        => $locale,
        ]);
    }

}
