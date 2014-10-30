<?php
/**
 * Copyright (C) 2014 David Young
 *
 * Defines the routing config
 */
return [
    // The route compiler class
    "compiler" => "RDev\\Routing\\Compiler",
    "routes" => [
        // The list of routes
        [
            "methods" => ["GET"],
            "path" => "/{path}",
            "options" => [
                "controller" => "Project\\Controllers\\Example@showHomepage",
                "variables" => [
                    "path" => ".*"
                ]
            ]
        ]
    ]
];