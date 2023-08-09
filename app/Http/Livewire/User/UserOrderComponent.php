<?php

namespace App\Http\Livewire\User;

use Livewire\Component;

class UserOrderComponent extends Component
{
    public function render()
    {
        return view('livewire.user.user-order-component')->layout('layouts.base');
    }
}
