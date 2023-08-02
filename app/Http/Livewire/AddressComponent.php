<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Address;
use Illuminate\Support\Facades\Auth;

class AddressComponent extends Component
{

    public function ship()
    {
        // session()->put('checkout',[
        //     'weight' => Crypt::decrypt($weight_total),
        // ]);
        // dd(session()->get('checkout')['weight']);

        if(Auth::check())
        {
            // return redirect()->route('shipping',['weight_total'=> $weight_total]);
            return redirect()->route('ship');

        }
        else
        {
            return redirect()->route('login');
        }
    }

    public function render()
    {
        $addresses = Address::all();
        return view('livewire.address-component',['addresses'=>$addresses])->layout('layouts.base');
    }

    public function deleteAddress($id)
    {
        session()->flash('message','Addresses has been deleted successfully!');
    }
}
