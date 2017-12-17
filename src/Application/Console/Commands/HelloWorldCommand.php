<?php
namespace Project\Application\Console\Commands;

use Opulence\Console\Commands\Command;
use Opulence\Console\Requests\Option;
use Opulence\Console\Requests\OptionTypes;
use Opulence\Console\Responses\IResponse;

/**
 * Defines an example "Hello, world" command
 */
class HelloWorldCommand extends Command
{
    /**
     * @inheritdoc
     */
    protected function define() : void
    {
        $this->setName('hello:world')
            ->setDescription('Defines an example console command')
            ->addOption(new Option(
                'yell',
                'y',
                OptionTypes::NO_VALUE,
                'Whether or not to yell'
            ));
    }

    /**
     * @inheritdoc
     */
    protected function doExecute(IResponse $response)
    {
        $message = 'Hello, world!';

        if ($this->optionIsSet('yell')) {
            $message = strtoupper($message);
        }

        $response->writeln("<info>$message</info>");
    }
}
