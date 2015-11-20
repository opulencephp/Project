<?php
use Opulence\Debug\Exceptions\Handlers\ExceptionHandler;
use Opulence\Http\HttpException;

/**
 * ----------------------------------------------------------
 * Define the exception handler
 * ----------------------------------------------------------
 *
 * The last parameter lists any exceptions you do not want to log
 */
return new ExceptionHandler(
    require __DIR__ . "/logging.php",
    $exceptionRenderer,
    [
        HttpException::class
    ]
);