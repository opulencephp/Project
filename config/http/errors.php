<?php
use Opulence\Debug\Errors\Handlers\ErrorHandler;

/**
 * ----------------------------------------------------------
 * Define the error handler
 * ----------------------------------------------------------
 */
return new ErrorHandler($logger, $exceptionHandler);
