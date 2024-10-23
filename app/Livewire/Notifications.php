<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Layout;

class Notifications extends Component
{
    #[Layout('components.layouts.user')]

    public function render()
    {
        return view('livewire.notifications');
    }
}
