<?php
/**
 * Copyright (C) 2015 David Young
 * 
 * Defines the common starting point for RDev applications
 */
use RDev\Applications\Application;

/**
 * ----------------------------------------------------------
 * Create our paths and check our setup
 * ----------------------------------------------------------
 */
$paths = require_once __DIR__ . "/../configs/paths.php";
require_once $paths["vendor"] . "/rdev/rdev/app/rdev/framework/setupcheck.php";

/**
 * ----------------------------------------------------------
 * Setup the application
 * ----------------------------------------------------------
 */
/** @var Application $application */
$application = require_once __DIR__ . "/../configs/application.php";