<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

class TiempoController extends Controller
{

    public function __construct($location)
    {
        $this->location = $location;
    }

    public function index(){

        $location = $this->location;

        if($location == 'Viladecans' || $location == 'viladecans'){
            $location = "Gavà";
        }

        $location_raw = $location;

        $location = str_replace(" ","%20",$location);

        //dd($location);

        // Obtenemos las coordenadas
        // https://api.opencagedata.com/geocode/v1/json?q=Sabadell&key=68d073cc87794b62a083a8c6c0561687&language=es&pretty=1

        $cage_key = env('OPENCAGEDATA_API_KEY', false);
        $cage_llamada = 'https://api.opencagedata.com/geocode/v1/json?q='.$location.'&key='.$cage_key.'&language=es&pretty=1';

        //dd($cage_llamada);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_URL, $cage_llamada);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_VERBOSE, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $cage_response = curl_exec($ch);
        curl_close($ch);
        $cage_data = json_decode($cage_response);

        //dd($cage_data);

        if ($cage_data->total_results == 0){

            $mensaje = "<b> \u{274C}  No encuentro esa localización</b>";

        } else {

            $cage_lat = $cage_data->results[0]->geometry->lat;
            $cage_long = $cage_data->results[0]->geometry->lng;
            $cage_formatted = $cage_data->results[0]->formatted;

            
            // Llalamos a la APi del tiempo
            $key = env('OPENWEATHER_API_KEY', false);
            $part = 'current,minutely,hourly,alerts';

            $llamada = 'https://api.openweathermap.org/data/2.5/onecall?lat='.$cage_lat.'&lon='.$cage_long.'&exclude='.$part.'&lang=ca&units=metric&appid='.$key;

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

            // Formateamos el ambiente
            $tiempo_main = '';
            switch ($data->daily[0]->weather[0]->main) {
                case 'Thunderstorm' || 'thunderstorm':
                    $tiempo_main = 'Tormenta';
                    break;
                case 'Drizzle' || 'drizzle':
                    $tiempo_main = 'Llovizna';
                    break;
                case 'Rain' || 'rain':
                    $tiempo_main = 'Lluvia';
                    break;
                case 'Snow' || 'snow':
                    $tiempo_main = 'Nieve';
                    break;
                case 'Clear' || 'clear':
                    $tiempo_main = 'Despejado';
                    break;
                case 'Clouds' || 'clouds':
                    $tiempo_main = 'Nublado';
                    break;
                case 'Squall' || 'squall':
                    $tiempo_main = 'Chubascos';
                    break;
            }

            

            $mensaje = "<b> \u{25FD}  Mañana en ".strtoupper($location_raw)." (" . $fechabien . ") :</b>\n\n";
            $mensaje .= "<b>AMBIENTE:</b> " . $tiempo_main . "\n";
            $mensaje .= "<b>T. MAX</b>  : " . $tmax . " º\n";
            $mensaje .= "<b>T. MIN</b>  : " . $tmin . " º\n";
            $mensaje .= "<b>VIENTO</b>  : " . $viento . " K/h \n";
            $mensaje .= "<b>HUMEDAD</b> : " . $data->daily[0]->humidity . " %\n\n";
            $mensaje .= "<i>Relativo a ".$cage_formatted."</i>";


        }

        

        //$mensaje = '*aaa*aaaaaa\nnew line1 \nnewline2';

        return $mensaje;

    }
}
