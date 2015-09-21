<?php
/**
 * Defines an example controller
 */
namespace Project\HTTP\Controllers;
use Opulence\HTTP\Responses\Response;
use Opulence\Routing\Controller;
use Opulence\Views\Compilers\ICompiler;
use Opulence\Views\Factories\IViewFactory;

class Page extends Controller
{
    /** @var ICompiler The view compiler to use */
    protected $viewCompiler = null;
    /** @var IViewFactory The factory to use to create views */
    protected $viewFactory = null;

    /**
     * @param ICompiler $compiler The view compiler to use
     * @param IViewFactory $viewFactory The factory to use to create views
     */
    public function __construct(ICompiler $compiler, IViewFactory $viewFactory)
    {
        $this->viewCompiler = $compiler;
        $this->viewFactory = $viewFactory;
    }

    /**
     * {@inheritdoc}
     */
    public function showHTTPError($statusCode)
    {
        $this->view = $this->viewFactory->create("HTTPError");
        $this->view->setVar("title", $statusCode . " Error");
        $this->view->setVar("errorTitle", $statusCode . " Error");

        return new Response($this->viewCompiler->compile($this->view), $statusCode);
    }

    /**
     * Shows the homepage
     *
     * @return Response The response
     */
    public function showHomePage()
    {
        $this->view = $this->viewFactory->create("Home");

        return new Response($this->viewCompiler->compile($this->view));
    }
}
