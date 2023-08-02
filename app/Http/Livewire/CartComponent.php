<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class CartComponent extends Component
{
    public $cart_count;

    public function render()
    {
        $this->setAmountforCheckout();
        return view('livewire.cart-component')->layout('layouts.base');
        // $cart_count = Cart::content()->count();
        // return view('livewire.cart-component',['cart_count'=> $cart_count])->layout('layouts.base');
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
    public function destroy($rowId)
    {
        Cart::remove($rowId);
        $cart_count = Cart::content()->count();
        $this->emitTo('cart-count-component', 'refreshComponent');
        session()->flash('success_message','Item has been removed');
        // return redirect()->to('/cart');
    }
    public function destroyAll()
    {
        Cart::destroy();
        session()->flash('success_message','Cart has been cleared');
        $this->emitTo('cart-count-component', 'refreshComponent');
        // return redirect()->to('/cart');
    }

    public function shippingCost($weight_total)
    {
        // $this->setWeightforCheckout();

        session()->put('checkout',[
            'weight' => Crypt::decrypt($weight_total),
        ]);
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

    public function setAmountforCheckout()
    {
        if(!Cart::count()>0)
        {
            session()->forget('checkout');
            return;
        }
        session()->put('checkout',[
            // 'discount' => 0,
            'subtotal' => Cart::subtotal(),
            // 'tax' => 0,
            'total' => Cart::total(),
        ]);
        // dd(session()->get('checkout')['subtotal']);
        // dd(Cart::subtotal());
    }

    // public function setWeightforCheckout(){
        // $cart = Cart::content();
        // dd($cart);
        // foreach (Cart::content() as $item) {
        //     dd($item->options);
        // }
    // }

}
