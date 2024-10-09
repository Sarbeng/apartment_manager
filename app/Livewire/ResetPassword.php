<?php

namespace App\Livewire;

use Livewire\Component;

class ResetPassword extends Component
{
    public function render(string $token)
    {
        return view('livewire.reset-password',['token' => $token]);
    }
}
