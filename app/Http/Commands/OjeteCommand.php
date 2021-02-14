<?php

namespace App\Http\Commands;
use Telegram\Bot\Commands\Command;

class OjeteCommand extends Command {

    protected $name = 'ojete';
    protected $description = 'Me comes todo el ojete';


    public function handle(){

        $text ="Correcto, me puedes comer todo el ojete";
        $this->replyWithMessage(compact('text'));

    }
}
