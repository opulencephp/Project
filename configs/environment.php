<?php
/**
 * Copyright (C) 2014 David Young
 *
 * Defines the environment config
 */
return [
    "production" => [
        // By default, all servers are listed as production
        ["type" => "regex", "value" => "/.*/"]
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