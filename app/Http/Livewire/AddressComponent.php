<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Address;

class AddressComponent extends Component
{

    public function deleteAddress($id)
    {
        session()->flash('message','Addresses has been deleted successfully!');
    }

    public function render()
    {
        $addresses = Address::all();
        return view('livewire.address-component',['addresses'=>$addresses])->layout('layouts.base');
    }
}
