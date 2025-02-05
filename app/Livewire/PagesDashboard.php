<?php

namespace App\Livewire;

use App\Models\Locale;
use App\Models\Page;
use Livewire\Component;

class PagesDashboard extends Component
{
    public function createPage()
    {
      return $this->redirect('/admin/pages/create');
    }

    public function createLocale(){
        return $this->redirect('/admin/pages/locales/create');
    }


    public function render()
    {

        $pages = Page::where('is_subpage', 0)->where('is_hardCoded', 0)->get();
        $subpages = Page::where('is_subpage', 1)->where('is_hardCoded', 0)->get();
        $hcpages = Page::where('is_hardCoded', 1)->get();
        $page_locales = Locale::all();

        return view('livewire.pages-dashboard')->with([
            'pages' => $pages,
            'page_locales' => $page_locales,
            'subpages' => $subpages,
            'hcpages' => $hcpages,
        ]);
    }


}
