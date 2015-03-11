<?php
/**
 * Copyright (C) 2015 David Young
 * 
 * Defines the console application test case
 */
namespace Project\Console;
use RDev\Applications\Application;
use RDev\Framework\Tests\ConsoleApplicationTestCase as BaseTestCase;

class ConsoleApplicationTestCase extends BaseTestCase
{
    /**
     * {@inheritdoc}
     */
    protected function setApplication()
    {
        /** @var Application $application */
        require __DIR__ . "/../../../../bootstrap/start.php";
        $application->registerBootstrappers(require $application->getPaths()["configs"] . "/console/bootstrappers.php");
        $this->application = $application;
    }
}