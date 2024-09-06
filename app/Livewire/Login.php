<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Auth;

class Login extends Component
{
    public $email;
    public $password;

    protected $rules = [
        'email' => 'required|email',
        'password' => 'required|min:6',
    ];

    public function save()
    {
        $this->validate();

        //dd('saving');

        if (Auth::attempt(['email' => $this->email, 'password' => $this->password])) {
            // Redirect on successful login
            return redirect()->intended('/dashboard');
        } else {
            // Show an error message on failed login
            session()->flash('error', 'Invalid login credentials.');
        }
        
    }
    public function render()
    {
        return view('livewire.login');
    }
}
