<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Cart;

class ShippingCostComponent extends Component
{
    public $weight_total;
    public $province_name;

    public function mount($weight_total)
    {
        $this->weight_total = $weight_total;
        // dd($weight_total);
    }

    public function render()
    {
        // $cart_summary = new CartSummary();
        $cart_summary = session('checkout');
        // $cart_subtotal = session()->get('checkout')['subtotal'];
        // dd($cart_summary);

        //memanggil function get_province
        $provinsi = $this->get_province();
        //mengarah kepada file checkout.blade.php yang ada di view
        return view('livewire.shipping-cost-component',['provinsi' => $provinsi])->layout("layouts.base");
        // return view('livewire.shipping-cost-component')->layout("layouts.base");
    }

    public function get_province(){
        $curl = curl_init();
        // dd($curl);

        curl_setopt_array($curl, array(
        // CURLOPT_URL => "https://api.rajaongkir.com/starter/province?id=12",
        CURLOPT_URL => "http://api.rajaongkir.com/starter/province",
        // CURLOPT_URL => "http://pro.rajaongkir.com/api/province",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
            // "key: ed3f0b1acbd5b27080d18806885f2071"
            "key: bb16551ede7aac939a5fdd4b985067e2",
        ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        // if ($err) {
        // echo "cURL Error #:" . $err;
        // } else {
        // echo $response;
        // }
        if ($err) {
            echo "cURL Error #:" . $err;
            } else {
            //ini kita decode data nya terlebih dahulu
            $response=json_decode($response,true);
            //ini untuk mengambil data provinsi yang ada di dalam rajaongkir resul
            $data_pengirim = $response['rajaongkir']['results'];
            return $data_pengirim;
        }
        // http://localhost:8000/province
    }

    public function get_city($id){
        $curl = curl_init();

        curl_setopt_array($curl, array(
        // CURLOPT_URL => "https://api.rajaongkir.com/starter/city?id=39&province=5",
        CURLOPT_URL => "http://api.rajaongkir.com/starter/city?&province=$id",
        // CURLOPT_URL => "http://pro.rajaongkir.com/api/city?province=" . $id . "",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
            "key: ed3f0b1acbd5b27080d18806885f2071"
            // "key: bb16551ede7aac939a5fdd4b985067e2",
        ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
            } else {
            $response=json_decode($response,true);
            $data_kota = $response['rajaongkir']['results'];
            return json_encode($data_kota);
        }
        // http://localhost:8000/city/6
    }

    public function get_ongkir($origin, $destination, $weight, $courier){
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => "http://api.rajaongkir.com/starter/cost",
        // CURLOPT_URL => "http://pro.rajaongkir.com/api/cost",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        // CURLOPT_POSTFIELDS => "origin=501&destination=114&weight=1700&courier=jne",
        CURLOPT_POSTFIELDS => "origin=$origin&destination=$destination&weight=$weight&courier=$courier",
        CURLOPT_HTTPHEADER => array(
        "content-type: application/x-www-form-urlencoded",
        "key: ed3f0b1acbd5b27080d18806885f2071"
        // "key: bb16551ede7aac939a5fdd4b985067e2",
        ),
        ));
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        if ($err) {
            echo "cURL Error #:" . $err;
            } else {
            $response=json_decode($response,true);
            $data_ongkir = $response['rajaongkir']['results'];
            return json_encode($data_ongkir);
        }
        // http://localhost:8000/origin=40&destination=40&weight=100&courier=jne
    }

    public function check_out(){
        $this->setAmountforCheckout();
        return redirect()->route('checkout');
    }

    public function setAmountforCheckout()
    {
        session()->put('checkout',[
            // 'province ' => $this->province_name,
            // 'discount' => 0,
            'subtotal' => Cart::subtotal(),
            // 'tax' => 0,
            // 'total' => Cart::total(),
            // 'shipping_cost' => $shipping_cost,
            // 'grandtotal' => $grandtotal,

        ]);
        // dd(session()->get('checkout'));
        // dd(session()->get('checkout')['subtotal']);

        // $this->province_name = session()->get('ss_province');

        // $data = [
        //     "session" => session()->get('checkout'),
        //     "province" => session()->get('ss_province'),
        // ];

        // dd($data);

    }
}
