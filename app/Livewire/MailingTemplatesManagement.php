<?php

namespace App\Livewire;

use Livewire\Component;

class MailingTemplatesManagement extends Component
{

    public $content = '';
    public $mail_title = '';

    public function render()
    {
        $saved_content = '';
        $locale = 'en'; //url /{locale} which means $locale??



        return view('livewire.mailing-templates-management')->with([
            'saved_content' => $saved_content,
            'server_ip' => request()->server('SERVER_ADDR'),
        ]);
    }
}
