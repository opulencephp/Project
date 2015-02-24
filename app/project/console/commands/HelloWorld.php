<?php
/**
 * Copyright (C) 2015 David Young
 * 
 * Defines an example "Hello, world" command
 */
namespace Project\Console\Commands;
use RDev\Console\Commands\Command;
use RDev\Console\Requests\Option;
use RDev\Console\Requests\OptionTypes;
use RDev\Console\Responses\IResponse;

class HelloWorld extends Command
{
    /**
     * {@inheritdoc}
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
     * {@inheritdoc}
     */
    protected function doExecute(IResponse $response)
    {
        $message = "Hello, world!";

        if($this->getOptionValue("yell") == "yes")
        {
            $message = strtoupper($message);
        }

        $response->writeln("<info>$message</info>");
    }
}