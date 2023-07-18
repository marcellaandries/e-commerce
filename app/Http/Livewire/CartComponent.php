<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Cart;

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

    public function increaseQuantity($rowId)
    {
        $product = Cart::get($rowId);
        $qty = $product->qty + 1;
        Cart::update($rowId,$qty);
        // return redirect()->route('product.cart');
        // dd($product);
    }

    public function decreaseQuantity($rowId)
    {
        $product = Cart::get($rowId);
        $qty = $product->qty - 1;
        if($qty > 0)
        {
            Cart::update($rowId,$qty);
            // return redirect()->route('product.cart');
            // dd($product);
        }
    }
}
