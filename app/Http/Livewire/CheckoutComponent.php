<?php

namespace App\Http\Livewire;
// namespace App\Http\Controllers;

use Livewire\Component;

use Illuminate\Http\Request;

class CheckoutComponent extends Component
{
    public function render()
    {
        return view('livewire.checkout-component')->layout("layouts.base");
    }

    // public function get_province(){
    //     $curl = curl_init();

    //     curl_setopt_array($curl, array(
    //         // change prod
    //     // CURLOPT_URL => "https://api.rajaongkir.com/starter/province?id=12",
    //     CURLOPT_URL => "http://api.rajaongkir.com/starter/province",
    //     CURLOPT_RETURNTRANSFER => true,
    //     CURLOPT_ENCODING => "",
    //     CURLOPT_MAXREDIRS => 10,
    //     CURLOPT_TIMEOUT => 30,
    //     CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    //     CURLOPT_CUSTOMREQUEST => "GET",
    //     CURLOPT_HTTPHEADER => array(
    //         "key: ed3f0b1acbd5b27080d18806885f2071"
    //     ),
    //     ));

    //     $response = curl_exec($curl);
    //     $err = curl_error($curl);

    //     curl_close($curl);

    //     if ($err) {
    //         echo "cURL Error #:" . $err;
    //         } else {
    //         //ini kita decode data nya terlebih dahulu
    //         $response=json_decode($response,true);
    //         //ini untuk mengambil data provinsi yang ada di dalam rajaongkir resul
    //         $data_pengirim = $response['rajaongkir']['results'];
    //         return $data_pengirim;
    //     }
    // }

    // public function get_city(){

    // }
    // public function checkout(){
    //     //mengarah kepada file checkout.blade.php yang ada di view
    //     return view('/checkout');
    // }
}
