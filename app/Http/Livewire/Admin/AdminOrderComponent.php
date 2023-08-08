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
        // dd("ZZ0", $this->status);
        if (empty($this->status)) {
            $this->status="all";
        }
        //  else {
        //     $this->status = $status;
        //  }
    }

    public function render()
    {
        if (session()->get('orders')['status'] !== null){
            // dd("clllllla", session()->get('orders')['status']);
            $this->status = session()->get('orders')['status'];
            // dd("statusnya", $this->status);
        }
        // // dd("SESSION2", session()->get('orders')['status']);
        // // dd($this->status);
        // if (($this->status) === "all") {
        //     // $this->status="all";
        //     // dd("alllll", $this->status);
        // }
        // else{
        //     dd("bukan all", $this->status);
        //     $this->status = session()->get('orders')['status'];
        //     dd($this->status);
        // }


        // dd(session()->get('orders')['status']);


        // dd($request->all());
        // $data = json_encode($request->getContent());
        // $data = json_encode($data);
        // dd($request->getContent());

        // dd("AA0", $this->status);
        // dd("AA000", $status);

        // dd("hello", $this->status);
        if($this->status === "all")
        {
            // dd("AA1", $this->status);
            $orders = Order::orderBy('created_at','DESC')->paginate(12);
            return view('livewire.admin.admin-order-component',['orders'=> $orders, 'status'=> 'all'])->layout('layouts.base');
        }
        else if($this->status === "paid")
        {
            // dd("AA2", $this->status);
            $orders = Order::where('status','like','%paid%')->orderBy('created_at','DESC')->paginate(12);
            return view('livewire.admin.admin-order-component',['orders'=> $orders, 'status'=> 'paid'])->layout('layouts.base');
            // dd("2", $orders);
        }
        // return view('livewire.admin.admin-order-component',['orders'=> $orders, 'orders_paid'=> $orders_paid])->layout('layouts.base');
    }

    public function orderFilter($status)
    {
        // dd($status);
        if($status === "all")
        {
            // dd("BB1", $status);
            $orders = Order::orderBy('created_at','DESC')->paginate(12);
            session()->put('orders',[
                'status' => "all",
            ]);

            return view('livewire.admin.admin-order-component',['orders'=> $orders, 'status'=> 'all'])->layout('layouts.base');

        }
        else if($status === "paid")
        {
            // dd("BB2", $status);
            $orders = Order::where('status', 'paid')->orderBy('created_at','DESC')->paginate(12);
            // dd("CC2", $orders);
            session()->put('orders',[
                'status' => "paid",
            ]);
            // dd("SESSION", session()->get('orders')['status']);
            return view('livewire.admin.admin-order-component',['orders'=> $orders, 'status'=> 'paid'])->layout('layouts.base');
        }

        // return redirect()->route('admin.orders');
    }
}
