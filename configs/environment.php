<?php
/**
 * Copyright (C) 2014 David Young
 *
 * Defines the environment config
 */
use RDev\Applications\Environments;

$detector = new Environments\EnvironmentDetector();
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

return new Environments\Environment($detector->detect($config));