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
        $this->template = $this->templateFactory->create("Example.php");
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
                $this->template->setVar("title", "404 Example");
                $this->template->setTag("content", "My custom 404 page");
                break;
            default:
                $this->template->setVar("title", $statusCode . " Example");
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
        $this->template->setVar("title", "First RDev Application");
        $this->template->setTag("content", "<h2>Congratulations on creating your first RDev application!</h2>To change the contents of this file, change the template in <b>views/Example.php</b> and the controller in <b>app/project/routing/controllers/Example.php</b>.");

        return new HTTP\Response($this->compiler->compile($this->template));
    }
}