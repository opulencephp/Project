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
     * Shows the homepage
     *
     * @return Response The response
     */
    public function showHomePage() : Response
    {
        $this->view = $this->viewFactory->createView("Home");

        return new Response($this->viewCompiler->compile($this->view));
    }
}