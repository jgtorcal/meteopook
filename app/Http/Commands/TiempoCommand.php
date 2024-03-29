<?php

namespace App\Http\Commands;
use Telegram\Bot\Commands\Command;
use App\Http\Controllers\TiempoController;
use Telegram\Bot\Objects\Update;
use Telegram\Bot\Commands\CommandBus;
use Illuminate\Http\Request;
use Telegram\Bot\Laravel\Facades\Telegram;


class TiempoCommand extends Command {

    protected $name = 'tiempo';
    protected $description = 'Información del tiempo';

    public function handle(){

        $update = Telegram::getWebhookUpdates();

        if (isset($update['message'])){

            $chatId = $update["message"]["chat"]["id"];
            $message = $update["message"]["text"];

        } elseif(isset($update['edited_message'])){

            $chatId = $update["edited_message"]["chat"]["id"];
            $message = $update["edited_message"]["text"];
        }

        if (strpos($message, "/tiempo") === 0) {
            $location = substr($message, 8);
        }

        $text = new TiempoController($location);


        $text = $text->index();

        $this->replyWithMessage([            
            'text'       => $text,
            'parse_mode' => 'HTML'
        ]);

    }
}
