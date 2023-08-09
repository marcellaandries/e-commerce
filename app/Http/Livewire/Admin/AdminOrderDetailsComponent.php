<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Order;

class AdminOrderDetailsComponent extends Component
{
    public $order_id;

    public function mount($order_id)
    {
        $this->order_id = $order_id;
    }

    public function render()
    {
        $order = Order::find($this->order_id);
        // dd($order);
        return view('livewire.admin.admin-order-details-component',['order'=>$order])->layout('layouts.base');
    }

    public function rupiah($var_number){
        $rupiah_result = "Rp " . number_format($var_number,2,',','.');
        return $rupiah_result;
    }
}
