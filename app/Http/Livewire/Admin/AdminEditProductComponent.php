<?php

namespace App\Http\Livewire\Admin;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;

class AdminEditProductComponent extends Component
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
    public $newimage;
    public $product_id;

    protected $rules = [
        'name' => 'required',
        'slug' => 'required',
        'description' => 'required',
        'regular_price' => 'required',
        'SKU' => 'required',
        'quantity' => 'required|numeric',
        'image' => 'required',
        'category_id' => 'required',
    ];

    public function mount($product_slug)
    {
        $product = Product::where('slug', $product_slug)->first();
        $this->name = $product->name;
        $this->slug = $product->slug;
        $this->short_description = $product->short_description;
        $this->description = $product->description;
        $this->regular_price = "Rp " . number_format($product->regular_price,0,',','.');
        if ($product->sale_price <> null)
        {
            $this->sale_price = "Rp " . number_format($product->sale_price,0,',','.');
        }
        $this->SKU = $product->SKU;
        $this->stock_status = $product->stock_status;
        $this->featured = $product->featured;
        $this->quantity = $product->quantity;
        $this->image = $product->image;
        $this->category_id = $product->category_id;
        $this->newimage = $product->newimage;
        $this->product_id = $product->id;
    }

    public function generateslug()
    {
        $this->slug = Str::slug($this->name,'-');
    }

    public function updateProduct()
    {
        $this->validate();
        $product = Product::find($this->product_id);
        $product->name = $this->name;
        $product->slug = $this->slug;
        $product->short_description = $this->short_description;
        $product->description = $this->description;
        $product->regular_price = preg_replace('/[^0-9]/', '', $this->regular_price);
        if ($this->sale_price <> null)
        {
            $product->sale_price = preg_replace('/[^0-9]/', '', $this->sale_price);
        }
        else
        {
            $product->sale_price = null;
        }
        // dd($this->sale_price . '-' . $product->sale_price);
        $product->SKU = $this->SKU;
        $product->stock_status = $this->stock_status;
        $product->featured = $this->featured;
        $product->quantity = $this->quantity;
        if($this->newimage)
        {
            $imageName = Carbon::now()->timestamp. '.' . $this->newimage->extension();
            $this->newimage->storeAs('products',$imageName);
            $product->image = $imageName;
        }
        $product->category_id = $this->category_id;
        $product->save();
        session()->flash('message','Product has been updated successfully!');
        return redirect()->route('admin.products');
    }

    public function render()
    {
        $categories = Category::all();
        return view('livewire.admin.admin-edit-product-component',['categories'=>$categories])->layout('layouts.base');
    }

}
