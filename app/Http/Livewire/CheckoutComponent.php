<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

use Cart;
use App\Models\Order;
use App\Models\OrderItem;

class CheckoutComponent extends Component
{
    public $ship_to_different;
    public $is_shipping_different;
    public $grandtotal;

    public $firstname;
    public $lastname;
    public $email;
    public $mobile;
    public $line1;
    public $line2;
    public $city;
    public $province;
    public $country;
    public $zipcode;

    public $s_firstname;
    public $s_lastname;
    public $s_email;
    public $s_mobile;
    public $s_line1;
    public $s_line2;
    public $s_city;
    public $s_province;
    public $s_country;
    public $s_zipcode;

    public function placeOrder()
    {
        // $this->validate([
        //     'firstname' =>  'required',
        //     'lastname' =>  'required',
        //     'email' =>  'required|email',
        //     'mobile' =>  'required|numeric',
        //     'line1' =>  'required',
        //     'line2' =>  'required',
        //     'city' =>  'required',
        //     'province' =>  'required',
        //     'country' =>  'required',
        //     'zipcode' =>  'required',
        // ]);

        $order = new Order();
        $order->user_id = Auth::user()->id;
        // $order->subtotal = session()->get('checkout')['subtotal'];
        // $order->discount = session()->get('checkout')['discount'];
        // $order->tax = session()->get('checkout')['tax'];
        $num_subtotal = session()->get('checkout')['subtotal'];
        $num_subtotal = str_replace(",00", "", $num_subtotal);
        $num_subtotal = str_replace(".", "", $num_subtotal);
        $order->subtotal = $num_subtotal;
        // dd($order->subtotal);
        $order->total = $this->grandtotal;
        $order->firstname = $this->firstname;
        $order->lastname = $this->lastname;
        $order->email = $this->email;
        $order->mobile = $this->mobile;
        $order->line1 = $this->line1;
        $order->line2 = $this->line2;
        $order->city = $this->city;
        $order->province = $this->province;
        $order->country = $this->country;
        $order->zipcode = $this->zipcode;
        $order->status = 'ordered';
        $order->is_shipping_different = $this->is_shipping_different ? 1:0;
        dd($order->subtotal);
        // $order->save();

        foreach(Cart::content() as$item)
        {
            $orderItem = new OrderItem();
            $orderItem = $item->id;
        }
    }

    public function render()
    {
        // dd(session()->get('checkout')['subtotal']);
        return view('livewire.checkout-component')->layout("layouts.base");
    }

    public function rupiah($var_number){

        $rupiah_result = "Rp " . number_format($var_number,2,',','.');
        return $rupiah_result;

    }

}
