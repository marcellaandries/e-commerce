<?php

namespace App\Http\Livewire;

use Cart;
use App\Models\Order;
use App\Models\OrderItem;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
// use Illuminate\Support\Str;

class CheckoutComponent extends Component
{
    public $ship_to_different;
    public $is_shipping_different;

    public $subtotal;
    public $total;
    public $shipping_cost;
    public $courier;
    public $service;

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

    public function mount()
    {
        $this->country = "Indonesia";
        $this->s_country = "Indonesia";

        $this->subtotal = session()->get('checkout')['subtotal'];
        $this->total = session()->get('checkout')['total'];

        $this->province = session()->get('checkout')['province_id'];
        $this->city = session()->get('checkout')['city_id'];

        $this->courier = session()->get('checkout')['courier'];
        $this->service = session()->get('checkout')['service'];
        $this->shipping_cost = session()->get('checkout')['shipping_cost'];
    }

    public function store(Request $request)
    {
        // dd($request->all());
        // dd($request->city);
    }

    public function placeOrder(Request $request)
    {
        // $request->validate([
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

        // save reqiest by textbox name
        // dd($request->fname);
        dd($request->all());

        $order = new Order();
        $order->user_id = Auth::user()->id;
        // $order->discount = session()->get('checkout')['discount'];
        // $order->tax = session()->get('checkout')['tax'];
        $num_subtotal = session()->get('checkout')['subtotal'];
        $num_subtotal = str_replace(",00", "", $num_subtotal);
        $num_subtotal = str_replace(".", "", $num_subtotal);
        $order->subtotal = $num_subtotal;

        $num_grandtotal = session()->get('checkout')['total'];
        $num_grandtotal = str_replace(",00", "", $num_grandtotal);
        $num_grandtotal = str_replace(".", "", $num_grandtotal);
        $order->total = $num_grandtotal;

        $order->firstname = $request->firstname;
        $order->lastname = $request->lastname;
        $order->email = $request->email;
        $order->mobile = $request->mobile;
        $order->line1 = $request->line1;
        $order->line2 = $request->line2;
        $order->country = $request->country;
        $order->province = session()->get('checkout')['province_id'];
        $order->city = session()->get('checkout')['city_id'];
        $order->zipcode = $request->zipcode;
        $order->status = 'ordered';
        $order->is_shipping_different = $request->is_shipping_different ? 1:0;

        $order->courier = session()->get('checkout')['courier'];
        $order->service = session()->get('checkout')['service'];
        $order->shipping_cost = session()->get('checkout')['shipping_cost'];


        // $data = $request->all();
        // dd($request->all());
        dd($order);
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
