<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class Register extends Component
{
    #[Validate('required')]
    public $firstname;

    #[Validate('required')]
    public $lastname;

    #[Validate('required|email|unique:users')]
    public $email;

    public $other_names;

    #[Validate('required|min:6|confirmed')]
    public $password;

    #[Validate('required')]
    public $password_confirmation;

    // public $country_of_residence;
    // public $nationality;

    // public $research_field;

    // public $research_sub_field;

    // public $alternative_email;

    // public $phone_number;

    // public $postal_address;

    // public $affiliation;

    // public $member_since;

    public function save()
    {
        $validatedData = $this->validate();
        //dd($this->firstname);
        //dd($validate);
        $user = User::firstOrCreate([
            'firstname' => $validatedData['firstname'],
            'lastname' => $validatedData['lastname'],
            'email' => $validatedData['email'],
            'other_names' => $this->other_names,
            'password' => $validatedData['password']
        ]);

        if ($user->wasRecentlyCreated) {
            // The user was created
            session()->flash('success', 'User created successful');
            //sleep(5);
            Auth::login($user);
            return redirect()->intended('/dashboard');

        } else {
            // The user already existed
            session()->flash('error', 'User already existed');
        }

        

        
    }
    public function render()
    {
        return view('livewire.register');
    }
}
