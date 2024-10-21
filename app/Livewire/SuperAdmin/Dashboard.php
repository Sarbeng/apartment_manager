<?php

namespace App\Livewire\SuperAdmin;

use Livewire\Component;
use Livewire\Attributes\Layout;

class Dashboard extends Component
{
    #[Layout('components.layouts.super-admin')]
    public function render()
    {
        return view('livewire.super-admin.dashboard');
    }
}
