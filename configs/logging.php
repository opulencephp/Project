<?php
/**
 * Copyright (C) 2014 David Young
 *
 * Defines the logging config
 */
use Monolog\Handler\ErrorLogHandler;
use Monolog\Logger;

$logger = new Logger("application");
$logger->pushHandler(new ErrorLogHandler());

return $logger;