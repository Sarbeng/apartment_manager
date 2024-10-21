<?php

namespace App\Livewire\Reviewer;

use Livewire\Component;
use Livewire\Attributes\Layout;

class ReviewAssignments extends Component
{
    #[Layout('components.layouts.reviewer')]
    public function render()
    {
        return view('livewire.reviewer.review-assignments');
    }
}
