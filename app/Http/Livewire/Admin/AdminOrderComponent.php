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
            return view('livewire.admin.admin-order-component',['orders'=> $orders, 'status'=> 'all'])->layout('layouts.base');
        }
        else if($this->status === "paid")
        {
            $orders = Order::where('status','like','%paid%')->orderBy('created_at','DESC')->paginate(12);
            return view('livewire.admin.admin-order-component',['orders'=> $orders, 'status'=> 'paid'])->layout('layouts.base');
        }
    }

    public function orderFilter($status)
    {
        if($status === "all")
        {
            $orders = Order::orderBy('created_at','DESC')->paginate(12);
            session()->put('orders',[
                'status' => "all",
            ]);
            // return view('livewire.admin.admin-order-component',['orders'=> $orders, 'status'=> 'all'])->layout('layouts.base');
            return view('livewire.admin.admin-order-component')->layout('layouts.base');

        }
        else if($status === "paid")
        {
            $orders = Order::where('status', 'paid')->orderBy('created_at','DESC')->paginate(12);
            session()->put('orders',[
                'status' => "paid",
            ]);
            // return view('livewire.admin.admin-order-component',['orders'=> $orders, 'status'=> 'paid'])->layout('layouts.base');
            return view('livewire.admin.admin-order-component')->layout('layouts.base');
        }
    }
}
