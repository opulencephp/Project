<?php
use Opulence\Exceptions\ExceptionHandler;
use Opulence\Http\HttpException;

/**
 * ----------------------------------------------------------
 * Define the exception handler
 * ----------------------------------------------------------
 */
$exceptionHandler = new ExceptionHandler(
    require __DIR__ . "/logging.php",
    $exceptionRenderer
);

/**
 * ----------------------------------------------------------
 * Define the exceptions to not log
 * ----------------------------------------------------------
 */
$exceptionHandler->doNotLog([
    HttpException::class
]);

return $exceptionHandler;