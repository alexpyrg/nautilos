<?php

namespace App\Livewire;

use App\Models\Locale;
use App\Models\Page;
use App\Models\PageContent;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class PageContentManagement extends Component
{
    public $pageId = '';
    public $page_id = '';
    public $slug = '';
    public $title = '';
    public $description = '';
    public $keywords = '';
    public $content = '';
    public $locale_id = '';
    public $live_loaded_page_content = '';

    public $show_content = ' asd lajkshd asjkd hasjkd hasd';

    public function mount($id) {
        $this->pageId = $id;
    }
    public function render()
    {
        $locales = Locale::all();
        $page_content = PageContent::find($this->pageId);
        $page = Page::find($this->pageId);
        return view('livewire.page-content-management', [
            'page_content' => $page_content,
            'page'=>$page,
            'locales' => $locales
        ])->extends('layouts.cms');
    }

    protected $rules = [
        'slug' => 'required',
        'title' => 'required',
        'description' => 'required',
        'keywords' => 'required',
        'content' => 'required',
        'locale' => 'required',

    ];

//    public function updated($property)
//    {
//        dd($property);
//
//        if ($this->getErrorBag()->hasAny()) {
//            $this->dispatchBrowserEvent('reinitialize-ckeditor');
//        }
//
//    }

    public function updating($property, $value)
    {
        // $property: The name of the current property being updated
        // $value: The value about to be set to the property
//        dd($property);
        if ($property === 'locale_id') {
//           dd('got_in_here');
            $this->live_loaded_page_content = PageContent::where('locale_id', $this->locale_id)->where('page_id', $this->pageId)->get();
            if($this->live_loaded_page_content->isNotEmpty() && $this->live_loaded_page_content->keywords != null && $this->live_loaded_page_content->title != null  ){
//                dd( $this->live_loaded_page_content);
                $this->show_content = $this->live_loaded_page_content->content;
                $this->title = $this->live_loaded_page_content->title;
                $this->description = $this->live_loaded_page_content->description;
                $this->slug = $this->live_loaded_page_content->url;
                $this->keywords = $this->live_loaded_page_content->keywords;
            }
        }
    }

//    public function updatedlocale_id($val){
//        dd($val);
//    }




    public function save(){
        if($this->validate){

            try{
                if(PageContent::updateOrCreate([
                    'page_id' => $this->pageId, 'locale_id' => $this->locale
                ],
                    [ 'title' => $this->title, 'keywords' => $this->keywords, 'description' => $this->description, 'content' => $this->content ]
                ));

                session()->flash('success', 'Το περιεχόμενο σελίδας αποθηκεύτηκε επιτυχώς!');
            }catch(\Exception $ex){
                session()->flash('error', 'Πρόβλημα κατά την αποθήκευση! ' . $ex->getMessage());
                return redirect()->back();
            }

        }else{
            session()->flash('error', 'Σφάλμα κατά την επικύρωση των αρχείων!');
            return redirect()->back();
        }






//        if(Auth::check() && $this->validate() && $this->pageId != null){
//
//            PageContent::create(
//                [
//                    'url'=> $this->slug,
//                    'title' => $this->title,
//                    'description' => $this->description,
//                    'keywords' => $this->keywords,
//                    'content' => $this->content,
//                    'locale' => $this->locale,
//                    'page_id' => $this->pageId
//                ]
//            );
//
//
//        }else{
//            return redirect('/');
//        }

        return $this->redirect('/easyupdate/pages');
    }
}
