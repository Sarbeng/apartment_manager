<?php

namespace App\Livewire;

use Livewire\Attributes\Validate;
use Livewire\Component;

class Register extends Component
{
    #[Validate('required')]
    public $firstname;

    #[Validate('required')]
    public $lastname;

    #[Validate('required')]
    public $email;

    #[Validate('required')]
    public $other_names;

    public $country_of_residence;
    public $nationality;

    public $research_field;

    public $research_sub_field;

    public $alternative_email;

    public $phone_number;

    public $postal_address;

    public $affiliation;

    public $member_since;

    public function save()
    {
        $this->validate();
        dd("another");
    }
    public function render()
    {
        return view('livewire.register');
    }
}
