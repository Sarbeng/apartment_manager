<?php

namespace App\Livewire\Forms;

use Livewire\Component;

class Input extends Component
{
    /**
     * here i will assign my variables for type,
     *  class 
     * and label
     */
    public $type = 'text';
    public $label = '';
    public $class;

    public $placeholder = '';
    public $model = '';

    // adding a constructor for initializing variables if needed
    // public function mount ($) 
    // {

    // }


    /**
     * Summary of render
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function render()
    {
        return view('livewire.forms.input');
    }
}
