<?php

namespace App\Livewire;

use Livewire\Attributes\Validate;
use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Livewire\Attributes\Layout;

class ForgotPassword extends Component
{
    /**
     * Summary of forgotPassword
     * Takes the Users Email, send them a link to reset their password
     * @return void
     */
    
   // #[Layout('components.layouts.app')]
   

    #[Validate('required|email')]
    public $email;
    public function forgotPassword (Request $request) 
    {
        //validating our inputs
        $validated = $request->validate([
            'email' => 'required|email|exists:users,email'
        ]);
       // $this->validated();

        //
        $status = Password::sendResetLink(
            $request->only('email')
        );

        //
        return $status === Password::RESET_LINK_SENT
                        ? back()->with(['status' => __($status)])
                        : back()->withErrors(['email' => __($status)]);

        
    }

    public function render()
    {
        return view('livewire.forgot-password');
    }
}
