<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Validate;
use Illuminate\Validation\Rules\Password;

class Register extends Component
{
    #[Validate('required')]
    public $firstname;

    #[Validate('required')]
    public $lastname;

    #[Validate('required|email')]
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
        $this->validate();
        // $this->validate([
        //     'password' => ['required', 'confirmed', Password::min(8)],
        //     'password_confirmation' => ['required'],
        // ]);
        dd("another");
    }
    public function render()
    {
        return view('livewire.register');
    }
}
