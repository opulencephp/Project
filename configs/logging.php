<?php
/**
 * Copyright (C) 2014 David Young
 *
 * Defines the logging config
 */
return [
    // List the Monolog handlers
    "handlers" => [
        "main" => [
            // List the attributes of this handler
            "type" => "Monolog\\Handler\\ErrorLogHandler"
        ]
    ]
];