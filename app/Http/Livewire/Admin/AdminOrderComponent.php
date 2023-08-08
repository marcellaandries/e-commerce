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

    // public function render(Request $request)
    public function render()
    {
        // $current_uri = request()->segments();
        // dd($current_uri);
        // array:2 [▼
        // 0 => "admin"
        // 1 => "orders"
        // ]
        // $segment = $request->segment(1);
        // dd($segment);
        if (session()->get('orders')['status'] !== null){
            $this->status = session()->get('orders')['status'];
        }
        if($this->status === "all")
        {
            $orders = Order::orderBy('created_at','DESC')->paginate(12);
            return view('livewire.admin.admin-order-component',['orders'=> $orders, 'status'=> 'all'])->layout('layouts.base');
        }
        else if($this->status === "ordered")
        {
            $orders = Order::where('status', 'ordered')->orderBy('created_at','DESC')->paginate(12);
            return view('livewire.admin.admin-order-component',['orders'=> $orders, 'status'=> 'ordered'])->layout('layouts.base');
        }
        else if($this->status === "paid")
        {
            $orders = Order::where('status', 'paid')->orderBy('created_at','DESC')->paginate(12);
            return view('livewire.admin.admin-order-component',['orders'=> $orders, 'status'=> 'paid'])->layout('layouts.base');
        }

        else if($this->status === "approved")
        {
            $orders = Order::where('status', 'approved')->orderBy('created_at','DESC')->paginate(12);
            return view('livewire.admin.admin-order-component',['orders'=> $orders, 'status'=> 'approved'])->layout('layouts.base');
        }
        else if($this->status === "delivered")
        {
            $orders = Order::where('status', 'delivered')->orderBy('created_at','DESC')->paginate(12);
            return view('livewire.admin.admin-order-component',['orders'=> $orders, 'status'=> 'delivered'])->layout('layouts.base');
        }
    }

    public function orderFilter($status)
    {
        if($status === "all")
        {
            // $orders = Order::orderBy('created_at','DESC')->paginate(12);
            session()->put('orders',[
                'status' => "all",
            ]);
            // return view('livewire.admin.admin-order-component',['orders'=> $orders, 'status'=> 'all'])->layout('layouts.base');
            return view('livewire.admin.admin-order-component')->layout('layouts.base');
        }
        else if($status === "ordered")
        {
            // $orders = Order::where('status', 'ordered')->orderBy('created_at','DESC')->paginate(12);
            session()->put('orders',[
                'status' => "ordered",
            ]);
            // return view('livewire.admin.admin-order-component',['orders'=> $orders, 'status'=> 'paid'])->layout('layouts.base');
            return view('livewire.admin.admin-order-component')->layout('layouts.base');
        }
        else if($status === "paid")
        {
            // $orders = Order::where('status', 'paid')->orderBy('created_at','DESC')->paginate(12);
            session()->put('orders',[
                'status' => "paid",
            ]);
            // return view('livewire.admin.admin-order-component',['orders'=> $orders, 'status'=> 'paid'])->layout('layouts.base');
            return view('livewire.admin.admin-order-component')->layout('layouts.base');
        }

        else if($status === "approved")
        {
            session()->put('orders',[
                'status' => "approved",
            ]);
            return view('livewire.admin.admin-order-component')->layout('layouts.base');
        }
        else if($status === "delivered")
        {
            session()->put('orders',[
                'status' => "delivered",
            ]);
            return view('livewire.admin.admin-order-component')->layout('layouts.base');
        }
    }
}
