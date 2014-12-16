<?php
/**
 * Copyright (C) 2014 David Young
 *
 * Defines the routing config
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