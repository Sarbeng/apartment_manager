<?php

namespace App\Livewire;

use Livewire\Component;

class Login extends Component
{
    // assigning variables to take email and password
    public $email = '';
    public $password = '';

    public function save () 
    {
        dd($this->only(['email','password']));
    }

    public function render()
    {
        return view('livewire.login');
    }
}
