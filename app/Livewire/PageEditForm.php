<?php

namespace App\Livewire;

use App\Models\Page;
use Livewire\Component;
use Livewire\Form;
use mysql_xdevapi\Exception;

class PageEditForm extends Component
{

        public $has_reservationForm;
        public $is_subpage;
        public $is_hardCoded;


    protected $rules=[
        'name' => 'required',
        'slug' => 'required',
        'display_name' => 'required',
        'file_name'=> 'required'
    ];
    public function save(){


        $this->file_name = str_replace(' ', '_',$this->name);
        $this->slug = str_replace(' ', '-', $this->slug);

        $this->file_name = str_replace(' ', '_',$this->name);
        $this->page->file_name = $this->file_name;
        $this->validate();

        $this->page->file_name = $this->file_name;
        $this->page->name = $this->name;
//        $page->display_name = $this->display_name;
        $this->page->is_home = $this->is_home;
        $this->page->is_published = $this->is_published;
        $this->page->slug = $this->slug;


       // dd($this->validate());
        if(!$this->validate())
        {
            return $this->redirect('/easyupdate/pages/');
        }else{
        try{
            $this->page->save();
        }catch(\Exception $ex){
            dd($ex);
        }

        }



        return $this->redirect('/easyupdate/pages');
    }
//    public function mount(Form $form){
////        $this->form = $form;
//    }
   public function render()
    {
        $this->page = Page::find($this->id);

        $this->slug = $this->page->slug;
        $this->name = $this->page->name;
        $this->file_name = $this->page->file_name;
        $this->display_name = $this->page->display_name;
        $this->is_home = $this->page->is_home;
        $this->is_published = $this->page->is_published;
        return view('livewire.page-edit-form')->with([
                'page' => $this->page
            ]
        );
    }
}
