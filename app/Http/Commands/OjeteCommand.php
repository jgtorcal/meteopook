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
    //protected $description = 'Help command, Get a list of commands';

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


        $this->replyWithMessage(compact('que te calles, carapolla'));
    }
}
