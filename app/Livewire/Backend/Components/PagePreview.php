<?php

namespace App\Livewire\Backend\Components;

use Livewire\Component;

class PagePreview extends Component
{
    public $content;
    public $isFullView = false;

    public function toggleView()
    {
        $this->isFullView = !$this->isFullView;
    }



    public function render()
    {
        return view('livewire.backend.components.page-preview');
    }
}
