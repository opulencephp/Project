<?php
/**
 * Copyright (C) 2015 David Young
 *
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
    $router->get("/", [
        "controller" => "Page@showHomePage",
        "name" => "home"
    ]);
    $router->get("/edit", [
        "controller" => "Page@showEditPage",
        "name" => "edit"
    ]);
});