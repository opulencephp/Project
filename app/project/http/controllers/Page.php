<?php
/**
 * Copyright (C) 2015 David Young
 *
 * Defines an example controller
 */
namespace Project\HTTP\Controllers;
use RDev\HTTP\Responses\Response;
use RDev\HTTP\Routing\Controller;
use RDev\Views\Compilers\ICompiler;
use RDev\Views\Factories\ITemplateFactory;

class Page extends Controller
{
    /** @var ICompiler The template compiler to use */
    protected $compiler = null;
    /** @var ITemplateFactory The factory to use to create templates */
    protected $templateFactory = null;

    /**
     * @param ICompiler $compiler The template compiler to use
     * @param ITemplateFactory $templateFactory The factory to use to create templates
     */
    public function __construct(ICompiler $compiler, ITemplateFactory $templateFactory)
    {
        $this->compiler = $compiler;
        $this->templateFactory = $templateFactory;
    }

    /**
     * Shows the edit page
     *
     * @return Response The response
     */
    public function showEditPage()
    {
        $this->template = $this->templateFactory->create("Edit.php");

        return new Response($this->compiler->compile($this->template));
    }

    /**
     * {@inheritdoc}
     */
    public function showHTTPError($statusCode)
    {
        $this->template = $this->templateFactory->create("HTTPError.php");
        $this->template->setVar("title", $statusCode . " Error");
        $this->template->setTag("errorTitle", $statusCode . " Error");

        return new Response($this->compiler->compile($this->template), $statusCode);
    }

    /**
     * Shows the homepage
     *
     * @return Response The response
     */
    public function showHomePage()
    {
        $this->template = $this->templateFactory->create("Home.php");

        return new Response($this->compiler->compile($this->template));
    }
}
