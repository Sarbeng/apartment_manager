<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class BaseComponent extends Component
{
    public function determineLayout()
    {
        $user = Auth::user();

        if ($user->role === 'admin') {
            return 'layouts.admin';
        } elseif ($user->role === 'reviewer') {
            return 'layouts.reviewer';
        } elseif ($user->role === 'user') {
            return 'layouts.user';
        } else {
            abort(403, 'Unauthorized action.');
        }
    }
    // public function render()
    // {
    //     return view('livewire.base-component');
    // }
}
