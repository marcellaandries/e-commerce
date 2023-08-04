<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Http\Request;

class AddAddressComponent extends Component
{
    public $firstname;
    // public $lastname;
    public $email;
    public $mobile;
    public $line1;
    // public $line2;
    public $kota_id;
    public $province_id;
    public $country;
    public $zipcode;

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
            dd($data_pengirim);
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

    public function addAddress(Request $request)
    {
        // dd($request->all());
        // dd($request->kota_id);
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
        dd($request->all());

    //     array:11 [▼
    //     "_token" => "w4vrr7xPx7CwcuGMFSXFxptQZ6yK49FgMoItBW86"
    //     "firstname" => "Cella Novi"
    //     "email" => "cla@gm.co.id"
    //     "mobile" => "021333333"
    //     "line1" => "Gedung Menara Batavia Lt.6 Kec Richest"
    //     "country" => "Indonesia"
    //     "province_id" => "1"
    //     "kota_id" => "114"
    //     "zipcode" => "88250"
    //     "province_name" => "Bali"
    //     "city_name" => "Kota Denpasar"
    //     ]
    // }
}
