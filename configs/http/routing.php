<?php
/**
 * Defines the routing config
 */
use RDev\Routing\Router;

/**
 * ----------------------------------------------------------
 * Create all of the routes for the HTTP kernel
 * ----------------------------------------------------------
 *
 * @var Router $router
 */
$router->group(["controllerNamespace" => "Project\\HTTP\\Controllers"], function() use ($router)
{
    $router->get("/", "Page@showHomePage", ["name" => "home"]);
    $router->get("/edit", "Page@showEditPage", ["name" => "edit"]);
});