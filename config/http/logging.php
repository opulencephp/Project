<?php
use Monolog\Handler\ErrorLogHandler;
use Monolog\Logger;

/**
 * ----------------------------------------------------------
 * Create a PSR-3 logger
 * ----------------------------------------------------------
 *
 * Note: You may use any PSR-3 logger you'd like
 * For convenience, the Monolog library is included here
 */
$logger = new Logger('application');
$logger->pushHandler(new ErrorLogHandler());

return $logger;
