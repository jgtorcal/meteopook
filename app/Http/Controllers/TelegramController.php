<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Telegram\Bot\Laravel\Facades\Telegram;
use Telegram\Bot\Api;
use App\Models\Updates;

use DB;

// -1001291111565 Pay to Cry

// array:2 [
//     "update_id" => 849054283
//     "message" => array:6 [
//       "message_id" => 35
//       "from" => array:5 [
//         "id" => 170018514
//         "is_bot" => false
//         "first_name" => "Jordi"
//         "username" => "JordiWP"
//         "language_code" => "es"
//       ]
//       "chat" => array:4 [
//         "id" => 170018514
//         "first_name" => "Jordi"
//         "username" => "JordiWP"
//         "type" => "private"
//       ]
//       "date" => 1613186355
//       "text" => "/987"
//       "entities" => array:1 [
//         0 => array:3 [
//           "offset" => 0
//           "length" => 4
//           "type" => "bot_command"
//         ]
//       ]
//     ]
//   ] 

class TelegramController extends Controller
{
    public function webhookUpdates(Request $request){

        $updates = Telegram::getWebhookUpdates();

        Updates::create(array(
            'update_id'     => $updates['update_id'],
            'message_id'    => $updates['message']['message_id'],
            'from_id'       => $updates['message']['from']['id'],
            'from_username' => $updates['message']['from']['username'],
            'chat_id'       => $updates['message']['chat']['id'],
            'text'          => $updates['message']['text']
        ));

        Telegram::sendMessage([
            'chat_id' => $updates['message']['from']['id'],
            'text' => 'que te calles'
        ]);
        return;

        

        // $update_id = $data[0]['update_id']
        // $username = $data[0]['message']['from']['username'];
        // $id = $data[0]['message']['from']['id'];


        // Telegram::sendMessage([
        //     'chat_id' => $id,
        //     'text' => "Que te calles"
        // ]);
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


        foreach($activity as $key=>$value){
            echo $value->update_id;
        }

   
        // 

        

        //$col = collect($activity);

        //dd($activity);

        return $activity;

    }
    

}
