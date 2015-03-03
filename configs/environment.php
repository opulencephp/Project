<?php
/**
 * Copyright (C) 2015 David Young
 *
 * Defines the environment config
 */
use RDev\Applications\Environments\Environment;
use RDev\Applications\Environments\EnvironmentDetector;

/**
 * ----------------------------------------------------------
 * Create the environment configuration
 * ----------------------------------------------------------
 */
$detector = new EnvironmentDetector();
$config = [
    "production" => [
        // By default, all servers are listed as production
        ["type" => "regex", "value" => "/^.*$/"]
    ],
    "staging" => [
        // The list of staging servers
    ],
    "testing" => [
        // The list of testing servers
    ],
    "development" => [
        // The list of development servers
    ]
];

$environmentName = $detector->detect($config);
$environment = new Environment($environmentName);

/**
 * ----------------------------------------------------------
 * Load environment variables for non-production environments
 * ----------------------------------------------------------
 *
 * Note:  For performance in production, it's highly suggested
 * you set environment variables on the server itself
 */
if($environmentName != "production")
{
    foreach(glob(__DIR__ . "/environment/.env.*.php") as $environmentFile)
    {
        if(basename($environmentFile) != ".env.example.php")
        {
            require_once $environmentFile;
        }
    }
}

return $environment;