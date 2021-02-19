<?php

namespace App\Http\Commands;
use Telegram\Bot\Commands\Command;
use App\Http\Controllers\LloroController;
use Telegram\Bot\Objects\Update;
use Telegram\Bot\Commands\CommandBus;
use Illuminate\Http\Request;
use Telegram\Bot\Laravel\Facades\Telegram;

class LloroCommand extends Command {

    protected $name = 'lloro';
    protected $description = 'Registra tus lloros';

    public function handle(){

        $update = Telegram::getWebhookUpdates();

        if (isset($update['message'])){

            $chatId = $update["message"]["chat"]["id"];
            $message = $update["message"]["text"];

        } elseif(isset($update['edited_message'])){

            $chatId = $update["edited_message"]["chat"]["id"];
            $message = $update["edited_message"]["text"];
        }

        if (strpos($message, "/lloro") === 0) {
            $location = substr($message, 7);
        }

        $text = new LloroController();

        //dd($text);
        $text = $text->store($update);

        $this->replyWithMessage([            
            'text'       => $text,
            'parse_mode' => 'HTML'
        ]);

    }
}
