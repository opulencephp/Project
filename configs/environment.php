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

return new Environment($detector->detect($config));