<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Product;

class AdminProductComponent extends Component
{
    use WithPagination;
    public function render()
    {
        $products = Product::paginate(10);
        return view('livewire.admin.admin-product-component',['products'=>$products])->layout('layouts.base');
    }
    public function rupiah($var_number){
        if($var_number<>0){
            $rupiah_result = "Rp " . number_format($var_number,2,',','.');
            return $rupiah_result;
        }
    }
}
