<?php

namespace App\Http\Livewire;

use Livewire\Component;

class AddressComponent extends Component
{
    public function index()
    {
        return "Selamat Routing Anda Sudah Benar";
    }
    public function render()
    {
        return view('livewire.address-component')->layout('layouts.base');
    }
}
