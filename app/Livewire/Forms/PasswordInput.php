<?php

namespace App\Livewire\Forms;

use Livewire\Component;

class PasswordInput extends Component
{
     /**
     * here i will assign my variables for type,
     *  class 
     * and label
     * isPasswordVisible is meant to track the password visibility
     */
    public $type = 'password';
    public $label = '';
    public $class = '';

    public $placeholder = '';
    public $model;
    public $name = '';

    public $isPasswordVisible = false;

    public function togglePasswordVisibility()
    {
        $this->isPasswordVisible = !$this->isPasswordVisible;
        $this->type = $this->isPasswordVisible ? 'text' : 'password';
    }
    public function render()
    {
        return view('livewire.forms.password-input');
    }
}
