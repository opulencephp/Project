<?php
/**
 * Defines an example controller
 */
namespace Project\HTTP\Controllers;

use Opulence\HTTP\Responses\Response;
use Opulence\Routing\Controller;

class Page extends Controller
{
    /**
     * @inheritdoc
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
