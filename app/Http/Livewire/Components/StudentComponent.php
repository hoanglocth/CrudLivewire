<?php

namespace App\Http\Livewire\Components;

use Livewire\Component;

class StudentComponent extends Component
{
    public function render()
    {
        return view('livewire.components.student-component')->layout('livewire.layouts.base');
    }
}
