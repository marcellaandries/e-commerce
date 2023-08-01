<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;

class AddressComponent extends Component
{

    public function deleteProduct($id)
    {
        $product = Product::find($id);
        $product->delete();
        session()->flash('message','Product has been deleted successfully!');
    }

    public function render()
    {
        $products = Product::all();
        return view('livewire.address-component',['products'=>$products])->layout('layouts.base');
    }
}
