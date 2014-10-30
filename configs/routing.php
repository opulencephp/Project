<?php
/**
 * Copyright (C) 2014 David Young
 *
 * Defines the routing config
 */
return [
    // The route compiler class
    "compiler" => "RDev\\Routing\\RouteCompiler",
    // The list of routes
    "routes" => [
        [
            "methods" => ["GET"],
            "path" => "/",
            "options" => [
                "controller" => "Project\\Routing\\Controllers\\Example@showHomepage"
            ]
        ]
    ],
    // The controller that will be called in the case of a missing route
    "missedRouteController" => "Project\\Routing\\Controllers\\Example"
];