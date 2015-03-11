<?php
/**
 * Copyright (C) 2015 David Young
 * 
 * Defines the HTTP application test case
 */
namespace Project\HTTP;
use RDev\Applications\Application;
use RDev\Framework\Tests\HTTP\ApplicationTestCase as BaseTestCase;

class ApplicationTestCase extends BaseTestCase
{
    /**
     * {@inheritdoc}
     */
    protected function setApplication()
    {
        /** @var Application $application */
        require __DIR__ . "/../../../../bootstrap/start.php";
        $application->registerBootstrappers(require $application->getPaths()["configs"] . "/http/bootstrappers.php");
        $this->application = $application;
    }
}