<?php
/**
 * Copyright (C) 2014 David Young
 *
 * Defines the logging config
 */
use Monolog\Logger;
use Monolog\Handler\ErrorLogHandler;

$logger = new Logger("application");
$logger->pushHandler(new ErrorLogHandler());

return $logger;