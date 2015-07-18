<?php
/**
 * Defines the common starting point for Opulence applications
 */
/**
 * ----------------------------------------------------------
 * Create our paths and check our setup
 * ----------------------------------------------------------
 */
$paths = require __DIR__ . "/../configs/paths.php";
require $paths["vendor"] . "/opulence/opulence/app/opulence/framework/setupcheck.php";

/**
 * ----------------------------------------------------------
 * Setup the application
 * ----------------------------------------------------------
 */
$application = require __DIR__ . "/../configs/application.php";