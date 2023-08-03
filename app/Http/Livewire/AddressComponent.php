<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Address;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AddressComponent extends Component
{

    // public $addressVal;
    // public $addresses;

    // public function mount()
    // {
    //     $addresses = Address::all();
    //     dd($addresses);
    //     $this->pagesize = 12;
    //     $this->$category_slug = $category_slug;
    // }

    public function ship()
    {
        // session()->put('checkout',[
        //     'weight' => Crypt::decrypt($weight_total),
        // ]);
        // dd(session()->get('checkout')['weight']);

        if(Auth::check())
        {
            // dd($this->addressVal);
            // dd($request->firstname);
            // dd($request->all());
            // dd($this->firstname);
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
        $addresses = Address::where('user_id',Auth::user()->id)->get();
        // dd($addresses);
        // $addresses = Address::all();
        return view('livewire.address-component',['addresses'=>$addresses])->layout('layouts.base');
    }

    public function deleteAddress($id)
    {
        session()->flash('message','Addresses has been deleted successfully!');
    }
}
