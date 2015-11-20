<?php
use Opulence\Applications\Environments\Environment;
use Opulence\Framework\Debug\Exceptions\Handlers\Http\ExceptionRenderer;

/**
 * ----------------------------------------------------------
 * Set the HTTP exception renderer
 * ----------------------------------------------------------
 */
return new ExceptionRenderer($environment->getName() == Environment::DEVELOPMENT);