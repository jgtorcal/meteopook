<?php

namespace App\Http\Commands;
use Telegram\Bot\Commands\Command;
use Carbon\Carbon;

class SemanaCommand extends Command {

    protected $name = 'semana';
    protected $description = 'Me comes todo el ojete';

    public function handle(){

        $current = Carbon::now();
        $weekNumber = $current->weekOfYear;

        $text ="Numero de semana: " . $weekNumber;
        $this->replyWithMessage(compact('text'));

    }
}

