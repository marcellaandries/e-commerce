<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Http\Request;

class AddAddressComponent extends Component
{
    public function render()
    {
        //memanggil function get_province
        $provinsi = $this->get_province();
        //mengarah kepada file checkout.blade.php yang ada di view
        // dd($provinsi);
        return view('livewire.add-address-component',['provinsi' => $provinsi])->layout("layouts.base");
        // return view('livewire.add-address-component')->layout('layouts.base');
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
            // dd($data_pengirim);
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

        // $this->city_id = session()->get('checkout')['city_id'];
        // $destination = $this->city_id;
        // dd($destination);

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
        // dd(CURLOPT_POSTFIELDS);
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        if ($err) {
            echo "cURL Error #:" . $err;
            } else {
            $response=json_decode($response,true);
            $data_ongkir = $response['rajaongkir']['results'];
            // dd($data_ongkir);
            return json_encode($data_ongkir);
        }
        // http://localhost:8000/origin=40&destination=40&weight=100&courier=jne
    }

    public function addAddress(Request $request)
    {
        $request->validate([
            'firstname' =>  'required',
            // 'lastname' =>  'required',
            'email' =>  'required|email',
            'mobile' =>  'required|numeric',
            'line1' =>  'required',
            'country' =>  'required',

            'province_id' =>  'required',
            'kota_id' =>  'required',
            'zipcode' =>  'required',
            'province_name' => 'required',
            'city_name' =>  'required',
        ]);
        // dd($request->all());

        // array:11 [▼
        // "_token" => "0Ax7voDpuqCOGFsdVM0tQaWvK9ury2Kq2MZ31vlR"
        // "firstname" => null
        // "email" => null
        // "mobile" => null
        // "line1" => null
        // "country" => "Indonesia"

        // "province_id" => "8"
        // "kota_id" => "293"
        // "zipcode" => null
        // "province_name" => "Jambi"
        // "city_name" => "Kabupaten Muaro Jambi"
        // ]
    }
}
