<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AemetController extends Controller
{

    public function index(){

        $aemet_api_key = env('AEMET_API_KEY', false); 
        $localidad = '08187';

        $curl = curl_init();

        $query = "https://opendata.aemet.es/opendata/api/mapasygraficos/mapassignificativos/cat/a/?api_key=".$aemet_api_key;
        $query = "https://opendata.aemet.es/opendata/api/maestro/municipio/sabadell/?api_key=".$aemet_api_key;

        curl_setopt_array($curl, array(
            CURLOPT_URL => $query,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "cache-control: no-cache"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
        echo "cURL Error #:" . $err;
        } else {
        //echo $response;
        }

    return $response;
    }
    
}
