<?php
/**
 * Copyright (C) 2014 David Young
 *
 * Defines the environment config
 */
use RDev\Applications\Environments\Environment;
use RDev\Applications\Environments\EnvironmentDetector;

$detector = new EnvironmentDetector();
$config = [
    "production" => [
        // By default, all servers are listed as production
    ],
    "staging" => [
        // The list of staging servers
    ],
    "testing" => [
        // The list of testing servers
    ],
    "development" => [
        // The list of development servers
        ["type" => "regex", "value" => "/^.*$/"]
    ]
];

return new Environment($detector->detect($config));