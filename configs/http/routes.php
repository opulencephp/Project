<?php
use Opulence\Routing\Router;

/**
 * ----------------------------------------------------------
 * Create all of the routes for the Http kernel
 * ----------------------------------------------------------
 *
 * @var Router $router
 */
$router->group(["controllerNamespace" => "Project\\Http\\Controllers"], function () use ($router) {
    $router->get("/", "Page@showHomePage", ["name" => "home"]);
});