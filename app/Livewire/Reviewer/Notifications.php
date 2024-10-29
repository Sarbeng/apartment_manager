<?php

namespace App\Livewire\Reviewer;

use Livewire\Component;
use Livewire\Attributes\Layout;

class Notifications extends Component
{
    #[Layout('components.layouts.reviewer')]
    public function render()
    {
        return view('livewire.reviewer.notifications');
    }
}
