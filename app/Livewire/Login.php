<?php

namespace App\Livewire;

use App\Models\User;
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
        $credentials = $this->validate();

       
        //dd($credentials['email'],$credentials['password']);


        // here i am checking if the details entered match what we have in the database and if it does we log the user in
        if (Auth::attempt(['email' => $credentials['email'], 'password' => $credentials['password']])) {
            // Redirect on successful login
            session()->regenerate();
            //return redirect()->intended('dashboard');

            //get the authenticated user
            $user = Auth::user();
            //dd($user->role);

            //checking the user roles to know where to redirect them
            if ($user->role === 'admin') {
                return redirect('admin');
            }
            elseif ($user->role === 'user') {
                return redirect('dashboard');
            }

        } else {
            // Show an error message on failed login
            session()->flash('error', 'These credentials do not match our records');
        }
        
    }
    public function render()
    {
        return view('livewire.login');
    }
}
