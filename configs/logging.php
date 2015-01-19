<?php
/**
 * Copyright (C) 2015 David Young
 *
 * Defines the logging config
 */
use Monolog\Handler\ErrorLogHandler;
use Monolog\Logger;

/**
 * ----------------------------------------------------------
 * Create a Monolog logger
 * ----------------------------------------------------------
 */
$logger = new Logger("application");
$logger->pushHandler(new ErrorLogHandler());

return $logger;