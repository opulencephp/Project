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
use RDev\Views\Factories;

class Example extends Routing\Controller
{
    /** @var Compilers\ICompiler The template compiler to use */
    protected $compiler = null;
    /** @var Factories\ITemplateFactory The factory to use to create templates */
    protected $templateFactory = null;

    /**
     * @param HTTP\Request $request The HTTP connection
     * @param Compilers\ICompiler $compiler The template compiler to use
     * @param Factories\ITemplateFactory $templateFactory The factory to use to create templates
     */
    public function __construct(
        HTTP\Request $request,
        Compilers\ICompiler $compiler,
        Factories\ITemplateFactory $templateFactory
    )
    {
        parent::__construct($request);

        $this->compiler = $compiler;
        $this->templateFactory = $templateFactory;
    }

    /**
     * {@inheritdoc}
     */
    public function showHTTPError($statusCode)
    {
        $this->template = $this->templateFactory->create("HTTPError.php");

        // Demonstrate showing custom error pages
        switch($statusCode)
        {
            case HTTP\ResponseHeaders::HTTP_NOT_FOUND:
                $this->template->setVar("title", "404 Example");
                $this->template->setTag("errorMessage", "My custom 404 page");
                break;
            default:
                $this->template->setVar("title", $statusCode . " Example");
                $this->template->setTag("errorMessage", "Something went wrong");
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
        $this->template = $this->templateFactory->create("Example.php");
        $this->template->setVar("title", "First RDev Application");

        return new HTTP\Response($this->compiler->compile($this->template));
    }
}