<?php

namespace App\Http\Livewire;

use Cart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Shipping;
use App\Models\Transaction;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
// use Illuminate\Support\Str;

class CheckoutComponent extends Component
{
    public $ship_to_different;

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

    public $paymentmode;

    public function mount()
    {
        $this->country = "Indonesia";
        $this->s_country = "Indonesia";

        $this->subtotal = session()->get('checkout')['subtotal'];
        $this->total = session()->get('checkout')['total'];

        $this->province = session()->get('checkout')['province_name'];
        $this->city = session()->get('checkout')['city_name'];

        $this->courier = session()->get('checkout')['courier'];
        $this->service = session()->get('checkout')['service_name'];
        $this->shipping_cost = session()->get('checkout')['shipping_cost'];
    }

    public function updated($fields)
    {
        // dd($fields);
        $this->validateOnly($fields, [
            'firstname' =>  'required',
            'lastname' =>  'required',
            'email' =>  'required|email',
            'mobile' =>  'required|numeric',
            'line1' =>  'required',

            'city' =>  'required',
            'province' =>  'required',
            'country' =>  'required',
            'zipcode' =>  'required',
            'paymentmethod' => 'required',
        ]);

        if($request->ship_to_different)
        {
            $request->validateOnly([
                's_firstname' =>  'required',
                's_lastname' =>  'required',
                's_email' =>  'required|email',
                's_mobile' =>  'required|numeric',
                's_line1' =>  'required',

                's_city' =>  'required',
                's_province' =>  'required',
                's_country' =>  'required',
                's_zipcode' =>  'required',
            ]);
        }
    }

    public function placeOrder(Request $request)
    {
        $request->validate([
            'firstname' =>  'required',
            'lastname' =>  'required',
            'email' =>  'required|email',
            'mobile' =>  'required|numeric',
            'line1' =>  'required',

            'city' =>  'required',
            'province' =>  'required',
            'country' =>  'required',
            'zipcode' =>  'required',
            'paymentmethod' => 'required',
        ]);
        // $request->paymentmethod

        // save request by textbox name
        // dd($request->fname);
        // dd($request->all());

        $order = new Order();
        $order->user_id = Auth::user()->id;
        // $order->discount = session()->get('checkout')['discount'];
        // $order->tax = session()->get('checkout')['tax'];
        $order->tax = 0;
        $num_subtotal = session()->get('checkout')['subtotal'];
        $num_subtotal = str_replace(",00", "", $num_subtotal);
        $num_subtotal = str_replace(".", "", $num_subtotal);
        $num_subtotal = str_replace("Rp", "", $num_subtotal);
        $order->subtotal = $num_subtotal;

        $num_grandtotal = session()->get('checkout')['total'];
        $num_grandtotal = str_replace(",00", "", $num_grandtotal);
        $num_grandtotal = str_replace(".", "", $num_grandtotal);
        $num_grandtotal = str_replace("Rp", "", $num_grandtotal);
        $order->total = $num_grandtotal;

        $order->firstname = $request->firstname;
        $order->lastname = $request->lastname;
        $order->email = $request->email;
        $order->mobile = $request->mobile;
        $order->line1 = $request->line1;
        $order->line2 = $request->line2;
        $order->country = $request->country;
        $order->province = session()->get('checkout')['province_name'];
        $order->city = session()->get('checkout')['city_name'];
        $order->zipcode = $request->zipcode;
        $order->status = 'ordered';
        $order->is_shipping_different = $request->ship_to_different ? 1:0;

        $order->courier = session()->get('checkout')['courier'];
        $order->service = session()->get('checkout')['service_name'];

        $num_shipping_cost = session()->get('checkout')['shipping_cost'];

        $num_shipping_cost = str_replace(",00", "", $num_shipping_cost);
        $num_shipping_cost = str_replace(".", "", $num_shipping_cost);
        $num_shipping_cost = str_replace("Rp", "", $num_shipping_cost);
        // var_dump($num_shipping_cost);
        $order->shipping_cost = $num_shipping_cost;

        // dd($order);
        // $data = $request->all();
        // dd($request->all());
        $order->save();

        foreach(Cart::content() as $item)
        {
            $orderItem = new OrderItem();
            $orderItem->product_id = $item->id;
            $orderItem->order_id = $order->id;

            $item->price = str_replace(".0", "", $item->price);
            $orderItem->price = $item->price;

            $orderItem->quantity = $item->qty;
            $orderItem->save();
        }
        // dd(Cart::content());

        if($request->ship_to_different)
        {
            $request->validate([
                's_firstname' =>  'required',
                's_lastname' =>  'required',
                's_email' =>  'required|email',
                's_mobile' =>  'required|numeric',
                's_line1' =>  'required',

                's_city' =>  'required',
                's_province' =>  'required',
                's_country' =>  'required',
                's_zipcode' =>  'required',
            ]);

            $shipping = new Shipping();
            $shipping->order_id = $order->id;
            $shipping->firstname = $request->s_firstname;
            $shipping->lastname = $request->s_lastname;
            $shipping->email = $request->s_email;
            $shipping->mobile = $request->s_mobile;
            $shipping->line1 = $request->s_line1;
            $shipping->line2 = $request->s_line2;
            $shipping->country = $request->s_country;
            $shipping->province = session()->get('checkout')['province_name'];
            $shipping->city = session()->get('checkout')['city_name'];
            $shipping->zipcode = $request->s_zipcode;
            $shipping->save();
            // dd($shipping);
        }


        if($request->paymentmethod == 'bank')
        {
            $transaction = new Transaction();
            $transaction->user_id = Auth::user()->id;
            $transaction->order_id = $order->id;
            $transaction->mode = 'bank';
            $transaction->status = 'pending';
            // dd($transaction);
            $transaction->save();
        }

        Cart::destroy();
        session()->forget('checkout');

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
