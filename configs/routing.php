<?php
/**
 * Copyright (C) 2014 David Young
 *
 * Defines the routing config
 */
$router->get("/", ["controller" => "Project\\Routing\\Controllers\\Example@showHomepage"]);