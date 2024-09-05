<?php

namespace App\Livewire\Forms;

use Livewire\Component;

class PasswordInput extends Component
{
     /**
     * here i will assign my variables for type,
     *  class 
     * and label
     */
    public $type = 'password';
    public $label = '';
    public $class = '';

    public $placeholder = '';
    public function render()
    {
        return view('livewire.forms.password-input');
    }
}
