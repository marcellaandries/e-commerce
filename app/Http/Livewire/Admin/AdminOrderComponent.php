<?php

namespace App\Http\Livewire\Admin;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

use Livewire\Component;

class AdminOrderComponent extends Component
{
    public $status;
    public function mount()
    {
        $this->status = "all";
    }

    public function render()
    {
        // dd("hello", $this->status);
        if($this->status === "all")
        {
            // dd("1", $this->status);
            $orders = Order::orderBy('created_at','DESC')->paginate(12);
        }
        else if($this->status === "paid")
        {
            // dd("2", $this->status);
            $orders = Order::where('status','like','%paid%')->orderBy('created_at','DESC')->paginate(12);
            // dd($orders);
        }
        return view('livewire.admin.admin-order-component',['orders'=> $orders])->layout('layouts.base');
        // $orders_paid = Order::where('status', 'paid')->where('status', 'paid')->orderBy('created_at','DESC')->paginate(12);
        // return view('livewire.admin.admin-order-component',['orders'=> $orders, 'orders_paid'=> $orders_paid])->layout('layouts.base');
    }

    public function orderFilter($status)
    {
        // dd($status);
        if($status === "all")
        {
            // dd("1", $status);
            $orders = Order::orderBy('created_at','DESC')->paginate(12);
        }
        else if($status === "paid")
        {
            // dd("2", $status);
            $orders = Order::where('status','like','%paid%')->orderBy('created_at','DESC')->paginate(12);
            // dd($orders);
        }
        // return view('livewire.admin.admin-order-component',['orders'=> $orders])->layout('layouts.base');
        return redirect()->route('admin.orders');
    }
}
