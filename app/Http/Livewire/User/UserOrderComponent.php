<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class UserOrderComponent extends Component
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
            // dd($this->status);
            $orders = Order::where('user_id', Auth::user()->id)->orderBy('created_at','DESC')->paginate(12);
        }
        else
        {
            $orders = Order::where('user_id', Auth::user()->id)->where('status', $this->status)->orderBy('created_at','DESC')->paginate(12);
        }
        return view('livewire.user.user-order-component',['orders'=> $orders, 'status'=> $this->status])->layout('layouts.base');
    }

    public function orderFilter($status)
    {
        session()->put('orders',[
            'status' => $status,
        ]);
        return view('livewire.admin.admin-order-component')->layout('layouts.base');
    }
}
