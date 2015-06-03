<?php
/**
 * Defines the list of paths needed by this application
 */
use RDev\Applications\Paths;

/**
 * ----------------------------------------------------------
 * List any paths used by our application
 * ----------------------------------------------------------
 */
$pathsConfig = [
    // The application directory
    "app" => __DIR__ . "/../app",
    // The configs directory
    "configs" => __DIR__,
    // The path to the logs directory
    "logs" => __DIR__ . "/../tmp/logs",
    // The path to the public directory
    "public" => __DIR__ . "/../public",
    // The path to the resources directory
    "resources" => __DIR__ . "/../resources",
    // The directory of this project's root directory
    "root" => __DIR__ . "/..",
    // The test directory
    "tests" => __DIR__ . "/../tests/app",
    // The path to the temporary directory
    "tmp" => __DIR__ . "/../tmp",
    // The framework's temporary directory
    "tmp.framework" => __DIR__ . "/../tmp/framework",
    // The path to the vendor (Composer) directory
    "vendor" => __DIR__ . "/../vendor",
    // The path to the view directory
    "views" => __DIR__ . "/../resources/views",
    // The path to the compiled view directory
    "views.compiled" => __DIR__ . "/../tmp/framework/http/views"
];

// Get the autoloader
require $pathsConfig["vendor"] . "/autoload.php";

return new Paths($pathsConfig);