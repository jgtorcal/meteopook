<?php


namespace App\Http\Commands;
use Telegram\Bot\Commands\Command;

/**
 * Class HelpCommand.
 */
class OjeteCommand extends Command
{
    /**
     * @var string Command Name
     */
    protected $name = 'ojete';

    /**
     * @var array Command Aliases
     */
    //protected $aliases = ['listcommands'];

    /**
     * @var string Command Description
     */
    protected $description = 'Me comes todo el ojete';

    /**
     * {@inheritdoc}
     */
    public function handle()
    {
        // $commands = $this->telegram->getCommands();

        // $text = '';
        // foreach ($commands as $name => $handler) {
        //     /* @var Command $handler */
        //     $text .= sprintf('/%s - %s'.PHP_EOL, $name, $handler->getDescription());
        // }

        $text ="Correcto, me puedes comer todo el ojete";
        $this->replyWithMessage(compact('text'));
    }
}
