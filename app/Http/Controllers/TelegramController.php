<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Telegram\Bot\Laravel\Facades\Telegram;
use Telegram\Bot\Api;
use App\Models\Updates;

use DB;

class TelegramController extends Controller
{
    public function webhookUpdates(Request $request){

        $activity = Telegram::getWebhookUpdates();

 

            $update_id = $activity['update_id'];
            $message_id = $activity['message']['message_id'];
            $from_id = $activity['message']['from']['id'];
            $from_username = $activity['message']['from']['username'];
            $chat_id = $activity['message']['chat']['id'];

            if (isset($activity['message']['text'])){

                $text = $activity['message']['text'];

                Updates::create(array(
                    'update_id'     => $update_id,
                    'message_id'    => $message_id,
                    'from_id'    => $from_id,
                    'from_username'    => $from_username,
                    'chat_id'    => $chat_id,
                    'text'    => $text,
                ));

            } else {

                Updates::create(array(
                    'update_id'     => $update_id,
                    'message_id'    => $message_id,
                    'from_id'    => $from_id,
                    'from_username'    => $from_username,
                    'chat_id'    => $chat_id
                ));

            }

            

        

        Telegram::sendMessage([
            'chat_id' => $chat_id,
            'text' => 'que te calles'
        ]);

        return 'ok';

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

        foreach ($activity as $item){

            $update_id = $item->update_id;
            $message_id = $item->message->message_id;
            $from_id = $item->message->from->id;
            $from_username = $item->message->from->username;
            $chat_id = $item->message->chat->id;
            $text = $item->message->text;
            
            Updates::create(array(
                'update_id'     => $update_id,
                'message_id'    => $message_id,
                'from_id'    => $from_id,
                'from_username'    => $from_username,
                'chat_id'    => $chat_id,
                'text'    => $text,
            ));

        }



        return "ok";

    }
    

}
