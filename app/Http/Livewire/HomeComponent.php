<?php

namespace App\Http\Livewire;

use Livewire\Component;

class HomeComponent extends Component
{
    public function render()
    {
        // cella
        return view('livewire.home-component')->layout('layouts.base');
    }
}
