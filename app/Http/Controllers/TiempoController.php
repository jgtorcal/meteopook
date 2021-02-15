<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

class TiempoController extends Controller
{

    public function index(){

        //https://api.openweathermap.org/data/2.5/onecall?lat={lat}&lon={lon}&exclude={part}&appid={API key}

        $key = env('OPENWEATHER_API_KEY', false);
        $lat = '41.563188';
        $long = '2.081533';
        $part = 'current,minutely,hourly,alerts';

        $max = 10;
        //$llamada = json_decode(file_get_contents('https://api.openweathermap.org/data/2.5/onecall?lat='.$lat.'&lon='.$long.'&exclude='.$part.'&appid='.$key));

        $llamada = 'https://api.openweathermap.org/data/2.5/onecall?lat='.$lat.'&lon='.$long.'&exclude='.$part.'&appid='.$key;
        

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_URL, $llamada);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_VERBOSE, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $response = curl_exec($ch);

        curl_close($ch);
        $data = json_decode($response);

        //dd($data);

        $fecha = $data->daily[0]->dt;
        $fechabien = Carbon::createFromTimestamp($fecha)->format('d-m-Y');

        $mensaje = '<b>El tiempo para mañana ' . $fechabien . ' es: ' . $data->daily[0]->weather[0]->main . '</b>';
        $mensaje .= 'Temp. máxima: ' . $data->daily[0]->temp->max . '\\n';
        $mensaje .= 'Temp. mínima: ' . $data->daily[0]->temp->min . '\\n';
        $mensaje .= 'Viento: ' . $data->daily[0]->wind_speed . '\\n';
        $mensaje .= 'Humedad: ' . $data->daily[0]->humidity . '\\n';

        $mensaje = '*aaa*aaaaaa\nnew line1 \nnewline2';

        return $mensaje;

    }
}
