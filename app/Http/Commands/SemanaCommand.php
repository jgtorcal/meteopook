<?php

namespace App\Http\Commands;
use Telegram\Bot\Commands\Command;

class OjeteCommand extends Command {

    protected $name = 'semana';
    protected $description = 'Me comes todo el ojete';


    public function handle(){

        $text ="Numero de semana";
        $this->replyWithMessage(compact('text'));

    }
}
