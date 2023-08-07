<?php

namespace App\Http\Livewire\Admin;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

use Livewire\Component;

class AdminOrderComponent extends Component
{
    public function render()
    {
        $orders = Order::orderBy('created_at','DESC')->paginate(12);
        $orders_paid = Order::where('status', 'paid')->where('status', 'paid')->orderBy('created_at','DESC')->paginate(12);
        return view('livewire.admin.admin-order-component',['orders'=> $orders, 'orders_paid'=> $orders_paid])->layout('layouts.base');
    }
}
