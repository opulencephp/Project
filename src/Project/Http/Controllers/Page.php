<?php
namespace Project\Http\Controllers;

use Opulence\Http\Responses\Response;
use Opulence\Routing\Controller;

/**
 * Defines an example controller
 */
class Page extends Controller
{
    /**
     * @inheritdoc
     */
    public function showHttpError($statusCode)
    {
        $this->view = $this->viewFactory->create("HttpError");
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
