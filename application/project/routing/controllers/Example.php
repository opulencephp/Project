<?php
/**
 * Copyright (C) 2014 David Young
 * 
 * Defines an example controller
 */
namespace Project\Routing\Controllers;
use RDev\HTTP;
use RDev\Routing;
use RDev\Views\Templates;

class Example extends Routing\Controller
{
    /** @var Templates\ICompiler The template compiler to use */
    protected $compiler = null;
    /** @var Templates\TemplateFactory The factory to use to create templates */
    protected $templateFactory = null;

    /**
     * @param HTTP\Connection $connection The HTTP connection
     * @param Templates\ICompiler $compiler The template compiler to use
     * @param Templates\TemplateFactory $templateFactory The factory to use to create templates
     */
    public function __construct(
        HTTP\Connection $connection,
        Templates\ICompiler $compiler,
        Templates\TemplateFactory $templateFactory
    )
    {
        parent::__construct($connection);

        $this->compiler = $compiler;
        $this->templateFactory = $templateFactory;
        $this->template = $this->templateFactory->create("Example.html");
        $this->template->setTag("projectName", "My Project");
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
                $this->template->setTag("content", "My custom 404 page");
                break;
            default:
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
        $this->template->setTag("content", "Hello, world!");

        return new HTTP\Response($this->compiler->compile($this->template));
    }
}