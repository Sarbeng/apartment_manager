<?php

namespace App\Livewire\Admin;

use App\Livewire\BaseComponent;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Dashboard  extends Component
{
    //#[Layout($this->determineLayout())]
    public function render()
    {
        return view('livewire.admin.dashboard')
                ->layout('components.layouts.admin');
    }
}
