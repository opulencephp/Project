<?php
/**
 * Copyright (C) 2014 David Young
 * 
 * Defines an example controller
 */
namespace Project\Routing\Controllers;
use RDev\HTTP;
use RDev\Routing;
use RDev\Views;
use RDev\Views\Compilers;

class Example extends Routing\Controller
{
    /** @var Compilers\ICompiler The template compiler to use */
    protected $compiler = null;
    /** @var Views\IFactory The factory to use to create templates */
    protected $templateFactory = null;

    /**
     * @param HTTP\Connection $connection The HTTP connection
     * @param Compilers\ICompiler $compiler The template compiler to use
     * @param Views\IFactory $templateFactory The factory to use to create templates
     */
    public function __construct(
        HTTP\Connection $connection,
        Compilers\ICompiler $compiler,
        Views\IFactory $templateFactory
    )
    {
        parent::__construct($connection);

        $this->compiler = $compiler;
        $this->templateFactory = $templateFactory;
        $this->template = $this->templateFactory->createTemplate("Example.html");
    }

    /**
     * {@inheritdoc}
     */
    public function showHTTPError($statusCode)
    {
        // Demonstrate showing custom error pages
        switch($statusCode)
        {
            case HTTP\ResponseHeaders::HTTP_NOT_FOUND:
                $this->template->setTag("title", "404 Example");
                $this->template->setTag("content", "My custom 404 page");
                break;
            default:
                $this->template->setTag("title", $statusCode . " Example");
                $this->template->setTag("content", "Something went wrong");
                break;
        }

        return new HTTP\Response($this->compiler->compile($this->template), $statusCode);
    }

    /**
     * Shows the homepage
     *
     * @return HTTP\Response The response
     */
    public function showHomepage()
    {
        // The classic "Hello, world!" example
        $this->template->setTag("title", "Hello World Example");
        $this->template->setTag("content", "Hello, world!");

        return new HTTP\Response($this->compiler->compile($this->template));
    }
}