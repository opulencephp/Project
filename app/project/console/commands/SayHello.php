<?php
/**
 * Copyright (C) 2015 David Young
 * 
 * Defines a basic command
 */
namespace Project\Console\Commands;
use RDev\Console\Commands;
use RDev\Console\Requests;
use RDev\Console\Responses;

class SayHello extends Commands\Command
{
    /**
     * {@inheritdoc}
     */
    public function execute(Responses\IResponse $response)
    {
        $message = "Hello, " . $this->getArgumentValue("name");

        if($this->getOptionValue("yell") == "yes")
        {
            $message = strtoupper($message);
        }

        $response->writeln($message);
    }

    /**
     * {@inheritdoc}
     */
    protected function define()
    {
        $this->setName("sayhello")
            ->setDescription("Says hello to someone")
            ->addArgument(new Requests\Argument(
                "name",
                Requests\ArgumentTypes::REQUIRED,
                "The name to say hello to"
            ))
            ->addOption(new Requests\Option(
                "yell",
                "y",
                Requests\OptionTypes::OPTIONAL_VALUE,
                "Yells hello",
                "yes"
            ));
    }
}