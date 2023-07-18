<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CartComponent extends Component
{
    public function render()
    {
        return view('livewire.cart-component')->layout('layouts.base');
    }

    public function rupiah($var_number){

        $rupiah_result = "Rp " . number_format($var_number,2,',','.');
        return $rupiah_result;

    }
}
