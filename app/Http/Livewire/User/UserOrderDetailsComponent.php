<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class UserOrderDetailsComponent extends Component
{
    public $order_id;

    public function mount($order_id)
    {
        $this->order_id = $order_id;
    }

    public function render()
    {
        // dd($this->order_id);
        $order = Order::where('user_id', Auth::user()->id)->where('id', $this->order_id)->first();
        // dd($order);
        return view('livewire.user.user-order-details-component', ['order'=>$order])->layout('layouts.base');
    }

    public function rupiah($var_number){
        $rupiah_result = "Rp " . number_format($var_number,2,',','.');
        return $rupiah_result;
    }
}
