<?php
/**
 * Copyright (C) 2014 David Young
 * 
 * Defines an example controller
 */
namespace Project\Controllers;
use RDev\HTTP;
use RDev\Routing;

class Example extends Routing\Controller
{
    /**
     * Shows the homepage
     *
     * @return HTTP\Response The response
     */
    public function showHomepage()
    {
        return new HTTP\Response("Hello, world!");
    }
}