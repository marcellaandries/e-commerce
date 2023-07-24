<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use Cart;

class DetailsComponent extends Component
{
    public $slug;

    public function mount($slug)
    {
        $this->slug = $slug;
    }

    public function store($product_id,$product_name,$product_price,$product_weight)
    {
        Cart::add($product_id,$product_name,1,$product_price,['weight' => $product_weight])->associate('App\Models\Product');
        // dd(Cart::content());
        session()->flash('success_message', 'Item added in Cart!');
        return redirect()->route('product.cart');
    }

    public function render()
    {
        $product = Product::where('slug',$this->slug)->first();
        // dd($product);
        $popular_products = Product::inRandomOrder()->limit(4)->get();
        $related_products = Product::where('category_id', $product->category_id)->inRandomOrder()->limit(5)->get();
        return view('livewire.details-component',['product'=> $product,'popular_products'=> $popular_products, 'related_products'=> $related_products])->layout("layouts.base");
    }

    public function rupiah($var_number){

        $rupiah_result = "Rp " . number_format($var_number,2,',','.');
        return $rupiah_result;

    }
}
