<?php

namespace App\Livewire;

use Livewire\Component;
use MongoDB\Driver\Session;

class PagesManagement extends Component
{
    public $keywords = '';
    public $description = '';
    public $name = '';
    public $url = '';
    public $pattern = '/<livewire:sidebar\s*\/>/';
    public $page_id = '';

    public function readPage($pageName){
        $filepath = './resources/views/' . $pageName . '.blade.php';
        if (file_exists($filepath)) {
            $fileContent = file_get_contents($filepath);

            return $fileContent;

        }else{
            return null; //make sure you handle that correctly!
        }
    }//readPage


//    public function addMenu($pageName){
//        $menuExists = '/<livewire:menu\s*\/>/';
//        $menuCommented = '\{\{-- <livewire:menu /> --\}\}';
//        $filepath = './resources/views/' . $pageName . '.blade.php';
//        if (file_exists($filepath)){
//            $fileContent = file_get_contents($filepath);
//            if(preg_match($menuCommented, $fileContent)){
//                try {
//                    preg_replace($menuCommented, '<livewire:menu />', $fileContent);
//                }catch(\Exception $ex){
//                    return response($ex->getMessage(), $ex->getCode());
//                }
//            }elseif(preg_match($menuExists, $fileContent)){
//                try{
//                preg_replace($menuExists, '<livewire:menu />', $fileContent);
//                }catch(\Exception $ex){
//                    return response($ex->getMessage(), $ex->getCode());
//                }
//            }else{
//                try{
//                str_replace('{{--MENU HERE--}}', '<livewire:menu />', $fileContent);
//                }catch(\Exception $ex){
//                    return response($ex->getMessage(), $ex->getCode());
//                }
//            }//ifelse...
//
//
//            return response('File error please contact the developer immediately. Code: PE-100-0424', '200');
//            //
//        }//if
//       session()->flash('File error please contact the developer immediately. Code: PE-101-0424');
//    }//addMenu
//AD MENU ABOVE COMMENTED OUT.

    public function render()
    {
        return view('livewire.pages-management');
    }

    public function cancel(){
        return $this->redirect('/easyupdate');
    }

}
