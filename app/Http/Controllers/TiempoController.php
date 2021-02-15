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

        $llamada = 'https://api.openweathermap.org/data/2.5/onecall?lat='.$lat.'&lon='.$long.'&exclude='.$part.'&lang=es&units=metric&appid='.$key;
        

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


        // Formateamos la fecha
        $fecha = $data->daily[0]->dt;
        $fechabien = Carbon::createFromTimestamp($fecha)->format('d-m-Y');

        // Formateamos el viento de m/s a K/h
        $viento = $data->daily[0]->wind_speed;
        $viento = $viento * 3.6;
        $viento = round($viento, 2);
        
        // Formateamos las temperaturas
        $tmax = round($data->daily[0]->temp->max, 1);
        $tmin = round($data->daily[0]->temp->min, 1);

        $mensaje = "<b> \u{25FD}  MAÑANA EN SABADELL (" . $fechabien . ") :</b>\n\n";
        $mensaje .= "<b>AMBIENTE:</b> " . $data->daily[0]->weather[0]->main . "\n";
        $mensaje .= "<b>T. MAX</b>  : " . $tmax . " º\n";
        $mensaje .= "<b>T. MIN</b>  : " . $tmin . " º\n";
        $mensaje .= "<b>VIENTO</b>  : " . $viento . " K/h \n";
        $mensaje .= "<b>HUMEDAD</b> : " . $data->daily[0]->humidity . " %\n";

        //$mensaje = '*aaa*aaaaaa\nnew line1 \nnewline2';

        return $mensaje;

    }
}
