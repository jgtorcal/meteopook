<?php

namespace App\Http\Commands;
use Telegram\Bot\Commands\Command;

class TiempoCommand extends Command {

    protected $name = 'tiempo';
    protected $description = 'Información del tiempo';


    public function handle(){

        $text ="Test";
        $this->replyWithMessage(compact('text'));

    }
}
