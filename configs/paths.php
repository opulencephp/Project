<?php
/**
 * Copyright (C) 2015 David Young
 * 
 * Defines the list of paths needed by this application
 */
use RDev\Applications\Paths;

/**
 * ----------------------------------------------------------
 * List any paths used by our application
 * ----------------------------------------------------------
 */
$pathsConfig = [
    // The directory of this project's root directory
    "root" => __DIR__ . "/..",
    // The application directory
    "app" => __DIR__ . "/../app",
    // The configs directory
    "configs" => __DIR__,
    // The path to the vendor (Composer) directory
    "vendor" => __DIR__ . "/../vendor",
    // The path to the public directory
    "public" => __DIR__ . "/../public",
    // The path to the resources directory
    "resources" => __DIR__ . "/../resources",
    // The path to the view directory
    "views" => __DIR__ . "/../resources/views",
    // The path to the compiled view directory
    "compiledViews" => __DIR__ . "/../tmp/http/views",
    // The path to the logs directory
    "logs" => __DIR__ . "/../tmp/logs"
];

// Get the autoloader
require_once $pathsConfig["vendor"] . "/autoload.php";

return new Paths($pathsConfig);