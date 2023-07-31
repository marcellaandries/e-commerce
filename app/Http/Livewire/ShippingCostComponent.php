<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Cart;
use Illuminate\Http\Request;
// use Illuminate\Support\Str;

use Illuminate\Support\Facades\Http;

class ShippingCostComponent extends Component
{
    public $weight_total;
    // public $province_name;

    public $province_name;
    public $city_name;
    public $kurir;
    public $service_name;
    public $weight;

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
            // dd($data_pengirim);
            $province_data = $data_pengirim;

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

    public function check_out(Request $request){
        $request->validate([
            'province_name' =>  'required',
            'city_name' =>  'required',
            'kurir' =>  'required',
            'service_name' =>  'required',
            'weight' =>  'required',
        ]);

        // $province_name = $request->input('nama_provinsi');
        // dd($request->all());
        $this->setAmountforCheckout($request);
        // $data = $request->all();
        // dd(compact('data'));
        // dd($request->all());

        return redirect()->route('checkout');
    }

    public function setAmountforCheckout($request)
    {
        // array:11 [▼
        //     "_token" => "8KNVfSnasbTPq0t75jRqzWBHjrWOkffa7tFn8GCs"
        //     "province_origin" => "6"
        //     "city_origin" => "152"
        //     "province_id" => "4"
        //     "kota_id" => "183"
        //     "kurir" => "jne"
        //     "layanan" => "0"
        //     "totalbelanja" => "Rp 10.360.000,00"
        //     "weight" => "12.000"
        //     "ongkos_kirim" => "Rp 540.000,00"
        //     "total_keseluruhan" => "Rp 10.900.000,00"
        // ]



        $res_data   = $request->all();
        // dd($res_data);
        // $tot = $res_data['total_keseluruhan'];
        // $space = Str::substr($tot, 2, 1);
        // $tot = str_replace($space, "", $tot);
        // dd($tot);

        session()->put('checkout',[
            // 'province ' => $this->province_name,
            // 'discount' => 0,
            'subtotal' => Cart::subtotal(),
            // 'tax' => 0,
            'province_id' => $res_data['province_id'],
            'province_name' => $res_data['province_name'],
            'city_id' => $res_data['kota_id'],
            'city_name' => $res_data['city_name'],
            'courier' => $res_data['kurir'],
            'service_id' => $res_data['layanan'],
            'service_name' => $res_data['service_name'],
            'total' => $res_data['totalbelanja'],
            'weight' => $res_data['weight'],
            'shipping_cost' => $res_data['ongkos_kirim'],
            'total' => $res_data['total_keseluruhan'],
        ]);
        // dd(session()->get('checkout'));
        // dd(session()->get('checkout')['total']);

        // var_dump(dd(session()->get('checkout')['total']));

        // $this->province_name = session()->get('ss_province');

        // $data = [
        //     "session" => session()->get('checkout'),
        //     "province" => session()->get('ss_province'),
        // ];

        // dd($data);

    }
}
