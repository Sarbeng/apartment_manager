<?php

namespace App\Livewire;

use Livewire\Component;

class ForgotPassword extends Component
{
    /**
     * Summary of forgotPassword
     * Takes the Users Email, send them a link to reset their password
     * @return void
     */
    public function forgotPassword () 
    {

    }

    public function render()
    {
        return view('livewire.forgot-password');
    }
}
