<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Carbon\Carbon;

class AdminAddProductComponent extends Component
{
    use WithFileUploads;
    public $name;
    public $slug;
    public $short_description;
    public $description;
    public $regular_price;
    public $sale_price;
    public $SKU;
    public $stock_status;
    public $featured;
    public $quantity;
    public $image;
    public $category_id;

    protected $rules = [
        'name' => 'required|unique:products,name',
        'slug' => 'required|unique:products,slug',
        'description' => 'required',
        'regular_price' => 'required',
        'SKU' => 'required',
        'quantity' => 'required|numeric',
        'image' => 'required',
        'category_id' => 'required',

    ];

    public function generateslug()
    {
        $this->slug = Str::slug($this->name);
    }

    public function mount()
    {
        $this->stock_status = 'instock';
        $this->featured = 0;
    }

    public function addProduct()
    {
        $this->validate();

        $product = new Product();
        $product->name = $this->name;
        $product->slug = $this->slug;
        $product->short_description = $this->short_description;
        $product->description = $this->description;
        $this->regular_price = preg_replace('/[^0-9]/', '', $this->regular_price);
        $product->regular_price = $this->regular_price;

        if ($this->sale_price <> null)
        {
            $this->sale_price = preg_replace('/[^0-9]/', '', $this->sale_price);
            $product->sale_price = $this->sale_price;
        }
        else
        {
            $product->sale_price = null;
        }

        $product->SKU = $this->SKU;
        $product->stock_status = $this->stock_status;
        $product->featured = $this->featured;
        $product->quantity = $this->quantity;
        $imageName = Carbon::now()->timestamp. '.' . $this->image->extension();
        $this->image->storeAs('products',$imageName);
        $product->image = $imageName;
        $product->category_id = $this->category_id;
        $product->save();
        session()->flash('message','Product has been created successfully!');
        return redirect()->route('admin.products');
    }

    public function render()
    {
        $categories = Category::all();
        return view('livewire.admin.admin-add-product-component',['categories'=>$categories])->layout('layouts.base');
    }

    public function rupiah($var_number){
        $rupiah_result = "Rp " . number_format($var_number,2,',','.');
        return $rupiah_result;
    }
}
