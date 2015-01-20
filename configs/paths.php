<?php
/**
 * Copyright (C) 2015 David Young
 * 
 * Defines the list of paths needed by this application
 */
use RDev\Framework\Paths;

/**
 * ----------------------------------------------------------
 * List any paths used by our application
 * ----------------------------------------------------------
 */
$pathsConfig = [
    // The directory of this project's root directory
    "root" => __DIR__ . "/..",
    // The path toe the vendor (Composer) directory
    "vendor" => __DIR__ . "/../vendor",
    // The path to the view directory
    "views" => __DIR__ . "/../views",
    // The path to the compiled view directory
    "compiledViews" => __DIR__ . "/../views/compiled"
];

// Get the autoloader
require_once $pathsConfig["vendor"] . "/autoload.php";

return new Paths($pathsConfig);