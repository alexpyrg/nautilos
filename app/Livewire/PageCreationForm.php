<?php

namespace App\Livewire;

use App\Models\Page;
use Livewire\Attributes\Validate;
use Livewire\Component;
use function PHPUnit\Framework\stringContains;

class PageCreationForm extends Component
{

    public $name = '';

//    public $file_name = '';
    public $is_published = false;

    public $is_home = false;

    public $file_name ='';
    public $display_name = '';
    public $is_subpage = 0;
    public $has_subpages = '';

    public $parent_page = null;

    public $has_reservationForm = true;

    public $is_hardCoded = false;

    protected $rules=[
      'name' => 'required',
    ];
    function formatPageName($page_name) {
        // 1. Convert everything to lowercase
        $result = strtolower($page_name);

        // 2. Replace spaces with underscores
        $result = str_replace(' ', '_', $result);

        return $result;
    }

    public function updated(){

    }

    public function save(){
        $this->validate();
        $this->file_name = str_replace(' ', '_',$this->name);
//        $this->slug = str_replace(' ', '-', $this->slug);
        if(!$this->validate())
        {
            if(!$this->is_subpage){
                $this->parent_page = null;
            }else{

            }
            Session::flash('success', 'Τα στοιχεία ήταν σωστά!');
        }
        $this->has_subpages = 0;
            Page::create([
                    'name' => $this->name,
                    'file_name' => $this->file_name,
                    'is_published' => $this->is_published,
                    'is_subpage' => $this->is_subpage,
                    'is_home' => $this->is_home,
                    'display_name' => $this->display_name,
                    'parent_page' => $this->parent_page,
                    'is_hardCoded' => $this->is_hardCoded,
                    'has_reservationForm' => $this->has_reservationForm,
                ]
            );

        return $this->redirect('/easyupdate/pages');
    }//savePage

    public function render()
    {
        $pages = Page::all();
        return view('livewire.page-creation-form')->with(compact('pages'));
    }


}
