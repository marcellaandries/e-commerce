<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;
use Cart;
use App\Models\Category;

class ShopComponent extends Component
{
    public $sorting;
    public $pagesize;

    public function mount()
    {
        $this->sorting = "default";
        $this->pagesize = 12;
    }

    public function store($product_id,$product_name,$product_price,$product_weight)
    {
        Cart::add($product_id,$product_name,1,$product_price,['weight' => $product_weight])->associate('App\Models\Product');
        // dd(Cart::content());
        session()->flash('success_message', 'Item added in Cart!');
        return redirect()->route('product.cart');
    }

    use WithPagination;
    public function render()
    {
        $popular_products = Product::inRandomOrder()->limit(4)->get();

        if($this->sorting=='date'){
            $products = Product::orderBy('created_at','DESC')->paginate($this->pagesize);
        }
        else if($this->sorting=='price'){
            $products = Product::orderBy('regular_price','ASC')->paginate($this->pagesize);
        }
        else if($this->sorting=='price-desc'){
            $products = Product::orderBy('regular_price','DESC')->paginate($this->pagesize);
        }
        else{
            $products = Product::paginate($this->pagesize);
        }
        // $products = Product::paginate(12);
        // dd($products);

        $categories = Category::all();

        return view('livewire.shop-component',['products'=> $products, 'categories'=> $categories, 'popular_products'=> $popular_products])->layout("layouts.base");
    }
    public function rupiah($var_number){

        $rupiah_result = "Rp " . number_format($var_number,2,',','.');
        return $rupiah_result;

    }
}
