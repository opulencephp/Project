<?php
use Opulence\Applications\Environments\Environment;
use Opulence\Debug\Exceptions\Handlers\ExceptionHandler;
use Opulence\Framework\Debug\Exceptions\Handlers\Http\ExceptionRenderer;
use Opulence\Http\HttpException;

/**
 * ----------------------------------------------------------
 * Define the exception handler
 * ----------------------------------------------------------
 *
 * The last parameter lists any exceptions you do not want to log
 */
$exceptionRenderer = new ExceptionRenderer($environment->getName() == Environment::DEVELOPMENT);

return new ExceptionHandler(
    require __DIR__ . "/logging.php",
    $exceptionRenderer,
    [
        HttpException::class
    ]
);