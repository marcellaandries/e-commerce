<?php

namespace App\Http\Livewire\Admin;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use Livewire\Component;

class AdminOrderComponent extends Component
{
    public $status;
    public function mount()
    {
        if (empty($this->status)) {
            $this->status="all";
            session()->put('orders',[
                'status' => "all",
            ]);
        }
    }

    public function render()
    {
        if (session()->get('orders')['status'] !== null){
            $this->status = session()->get('orders')['status'];
        }
        if($this->status === "all")
        {
            $orders = Order::orderBy('created_at','DESC')->paginate(12);
        }
        else
        {
            $orders = Order::where('status', $this->status)->orderBy('created_at','DESC')->paginate(12);
        }
        return view('livewire.admin.admin-order-component',['orders'=> $orders, 'status'=> $this->status])->layout('layouts.base');
    }

    public function orderFilter($status)
    {
        if($status === "all")
        {
            session()->put('orders',[
                'status' => "all",
            ]);
        }
        else if($status === "ordered")
        {
            session()->put('orders',[
                'status' => "ordered",
            ]);
        }
        else if($status === "waiting_for_payment")
        {
            session()->put('orders',[
                'status' => "waiting_for_payment",
            ]);
        }

        else if($status === "paid")
        {
            session()->put('orders',[
                'status' => "paid",
            ]);
        }
        else if($status === "delivered")
        {
            session()->put('orders',[
                'status' => "delivered",
            ]);
        }
        return view('livewire.admin.admin-order-component')->layout('layouts.base');
    }
}
