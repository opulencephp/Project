<?php
/**
 * Defines an example "Hello, world" command
 */
namespace Project\Console\Commands;

use Opulence\Console\Commands\Command;
use Opulence\Console\Requests\Option;
use Opulence\Console\Requests\OptionTypes;
use Opulence\Console\Responses\IResponse;

class HelloWorldCommand extends Command
{
    /**
     * @inheritdoc
     */
    protected function define()
    {
        $this->setName("hello:world")
            ->setDescription("Defines an example console command")
            ->addOption(new Option(
                "yell",
                "y",
                OptionTypes::OPTIONAL_VALUE,
                "Whether or not to yell",
                "yes"
            ));
    }

    /**
     * @inheritdoc
     */
    protected function doExecute(IResponse $response)
    {
        $message = "Hello, world!";

        if ($this->getOptionValue("yell") == "yes") {
            $message = strtoupper($message);
        }

        $response->writeln("<info>$message</info>");
    }
}