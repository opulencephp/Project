<?php
/**
 * ----------------------------------------------------------
 * Define the PHPUnit config
 * ----------------------------------------------------------
 */
$paths = require __DIR__ . '/paths.php';

// Set the default timezone in case the test server doesn't have it already set
date_default_timezone_set('UTC');
