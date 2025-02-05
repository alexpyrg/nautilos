<?php

namespace App\Livewire;

use App\Models\PageContent;
use Livewire\Component;

class NewPageContentManagement extends Component
{
    public $page_id;
    public $page_content;
    public $description;
    public $title;
    public $keywords;
    public $d;
    public $locale;
    public function mount(){
        $this->locale = '1';
    }
    public function render()
    {
        $this->locale = ' test ';
        return view('livewire.new-page-content-management')->with([
            'poutsa' => $this->locale,
        ]);
    }//render

    public function loadPageContent($page_id){
            if(PageContent::where('page_id', $page_id)->exists()){
                return PageContent::where('page_id', $page_id)->get();
            }else{
                return redirect()->back()->withErrors('Could not find requested page! Please make sure the page provided exists, if you are sure about that, please contact your developer.');
            }

    }//loadPageContent

    public function savePageContent(){
        if($this->validate([
            'page_id' => 'required',
            'page_content' => 'required',
            'description' => 'required',
            'keywords' => 'required',
            'locale'=> 'required',

        ])){
            try{
                PageContent::updateOrCreate([
                    'page_id' => $this->page_id,
                    'locale' => $this->locale
                ],[
                    'content' => $this->page_content,
                    'keywords' => $this->keywords,
                    'description' => $this->description
                ]);
            }catch(\Exception $ex){
                return session()->flash('error', "{$ex->getMessage()}");
            }

        }else{
            session()->flash('error', 'Παρακαλώ συμπληρώστε όλα τα πεδία!');
        }//if
    }

}
 
