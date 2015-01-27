<?php
/**
 * Copyright (C) 2015 David Young
 * 
 * Defines an example "Hello, world" command
 */
namespace Project\Console\Commands;
use RDev\Console\Commands;
use RDev\Console\Requests;
use RDev\Console\Responses;

class HelloWorld extends Commands\Command
{
    /**
     * {@inheritdoc}
     */
    protected function define()
    {
        $this->setName("hello:world")
            ->setDescription("Defines an example console command")
            ->addOption(new Requests\Option(
                "yell",
                "y",
                Requests\OptionTypes::OPTIONAL_VALUE,
                "Whether or not to yell",
                "yes"
            ));
    }

    /**
     * {@inheritdoc}
     */
    protected function doExecute(Responses\IResponse $response)
    {
        $message = "Hello, world!";

        if($this->getOptionValue("yell") == "yes")
        {
            $message = strtoupper($message);
        }

        $response->writeln("<info>$message</info>");
    }
}