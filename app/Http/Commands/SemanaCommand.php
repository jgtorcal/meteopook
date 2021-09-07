<?php

namespace App\Http\Commands;
use Telegram\Bot\Commands\Command;

class SemanaCommand extends Command {

    protected $name = 'semana';
    protected $description = 'Me comes todo el ojete';


    public function handle(){

        $text ="Numero de semana";
        $this->replyWithMessage(compact('text'));

    }
}
