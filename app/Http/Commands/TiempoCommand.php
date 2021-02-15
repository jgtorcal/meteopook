<?php

namespace App\Http\Commands;
use Telegram\Bot\Commands\Command;
use App\Http\Controllers\TiempoController;

class TiempoCommand extends Command {

    protected $name = 'tiempo';
    protected $description = 'Información del tiempo';


    public function handle(){

        $text = new TiempoController();

        
        json_encode($text = $text->index());

        //$text ="Test";
        //$this->replyWithMessage(compact('text'));

        $this->replyWithMessage([            
            'text'       => $text,
            'parse_mode' => 'HTML'
        ]);

        

    }
}
