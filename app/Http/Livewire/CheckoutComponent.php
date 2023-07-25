<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;

class CheckoutComponent extends Component
{
    public $ship_to_different;

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
        $this->validate([
            'firstname' =>  'required',
            'lastname' =>  'required',
            'email' =>  'required|email',
            'mobile' =>  'required|numeric',
            'line1' =>  'required',
            'line2' =>  'required',
            'city' =>  'required',
            'province' =>  'required',
            'country' =>  'required',
            'zipcode' =>  'required',
        ]);

        $order = new Order();
        $order->user_id = Auth::user()->id;
        $order->subtotal = session()->get('checkout')[' '];
        // $order
        // $order
        $order->total == session()->get('checkout')['total'];
        // $order
        // $order
        // $order
        dd(session()->get('checkout')['subtotal']);
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
