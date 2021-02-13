<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Telegram\Bot\Laravel\Facades\Telegram;

use DB;

// -1001291111565 Pay to Cry

class TelegramController extends Controller
{
    public function webhookUpdates(){

        Telegram::sendMessage([
            'chat_id' => '170018514',
            'text' => 'Si me llamas, respondo (de momento sin mirar la mierda que me digas)'
        ]);
        return;

    }

    public function enviar(){

        Telegram::sendMessage([
            'chat_id' => '-1001291111565',
            'text' => 'Te doy la mano'
        ]);
        return;

    }


    public function enviartest(){

        Telegram::sendMessage([
            'chat_id' => '170018514',
            'text' => 'Te doy la mano'
        ]);
        return;

    }

    public function updates(){

        $activity = Telegram::getUpdates();
        //$col = collect($activity);

        //dd($activity);

        return $activity;

    }
    

}
