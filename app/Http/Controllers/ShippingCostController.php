<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShippingCostController extends Controller
{

    // public function get_province(){
    //     $curl = curl_init();
    //     // dd($curl);

    //     curl_setopt_array($curl, array(
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

    //     // if ($err) {
    //     // echo "cURL Error #:" . $err;
    //     // } else {
    //     // echo $response;
    //     // }
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

    public function get_city(){
    }
    public function checkout(){
    //mengarah kepada file checkout.blade.php yang ada di view
    return view('checkout');
    }

    //
    public function ro_province()
    {
        // change prod
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "http://pro.rajaongkir.com/api/province",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "content-type: application/x-www-form-urlencoded",
                "key: ed3f0b1acbd5b27080d18806885f2071",
            ),
        ));
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        return response()->json(json_decode($response));
    }

    // public function ro_city($id)
    // {
    //     $curl = curl_init();
    //     curl_setopt_array($curl, array(
    //         CURLOPT_URL => "https://pro.rajaongkir.com/api/city?province=" . $id . "",
    //         CURLOPT_RETURNTRANSFER => true,
    //         CURLOPT_ENCODING => "",
    //         CURLOPT_MAXREDIRS => 10,
    //         CURLOPT_TIMEOUT => 30,
    //         CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    //         CURLOPT_CUSTOMREQUEST => "GET",
    //         CURLOPT_HTTPHEADER => array(
    //             "content-type: application/x-www-form-urlencoded",
    //             "key: bb16551ede7aac939a5fdd4b985067e2",
    //         ),
    //     ));
    //     $response = curl_exec($curl);
    //     $err = curl_error($curl);
    //     curl_close($curl);
    //     return response()->json(json_decode($response));
    // }
}
