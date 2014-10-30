<?php
/**
 * Copyright (C) 2014 David Young
 * 
 * Defines an example controller
 */
namespace Project\Routing\Controllers;
use RDev\HTTP;
use RDev\Routing;

class Example extends Routing\Controller
{
    /**
     * {@inheritdoc}
     */
    public function showHTTPError($statusCode)
    {
        // Demonstrate showing custom error pages
        switch($statusCode)
        {
            case HTTP\ResponseHeaders::HTTP_NOT_FOUND:
                return new HTTP\Response("My custom 404 page", $statusCode);
            default:
                return new HTTP\Response("Something went wrong", $statusCode);
        }
    }

    /**
     * Shows the homepage
     *
     * @return HTTP\Response The response
     */
    public function showHomepage()
    {
        // The class "Hello, world!" example
        return new HTTP\Response("Hello, world!");
    }
}