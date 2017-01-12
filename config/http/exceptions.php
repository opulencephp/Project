<?php
use Opulence\Debug\Exceptions\Handlers\ExceptionHandler;
use Opulence\Environments\Environment;
use Opulence\Framework\Debug\Exceptions\Handlers\Http\ExceptionRenderer;
use Opulence\Http\HttpException;

/**
 * ----------------------------------------------------------
 * Define the exception handler
 * ----------------------------------------------------------
 *
 * The last parameter lists any exceptions you do not want to log
 */
$exceptionRenderer = new ExceptionRenderer(Environment::getVar('ENV_NAME') == Environment::DEVELOPMENT);

return new ExceptionHandler(
    $logger,
    $exceptionRenderer,
    [
        HttpException::class
    ]
);
