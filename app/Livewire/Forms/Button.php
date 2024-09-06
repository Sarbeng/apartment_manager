<?php

namespace App\Livewire\Forms;

use Livewire\Component;

class Button extends Component
{
    public $type = 'button';
    public $label = '';
    public function render()
    {
        return view('livewire.forms.button');
    }
}
