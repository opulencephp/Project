<?php
use Opulence\Debug\Exceptions\Handlers\ExceptionHandler;
use Opulence\Http\HttpException;

/**
 * ----------------------------------------------------------
 * Define the exception handler
 * ----------------------------------------------------------
 */
return new ExceptionHandler(
    require __DIR__ . "/logging.php",
    $exceptionRenderer,
    [
        HttpException::class
    ]
);