<?php
namespace Project\Application\Http\Controllers;

use Opulence\Http\Responses\Response;
use Opulence\Routing\Controller;

/**
 * Defines an example controller for the tutorial
 */
class Tutorial extends Controller
{
    /**
     * Shows the tutorial homepage
     *
     * @return Response The response
     */
    public function showHomePage() : Response
    {
        $this->view = $this->viewFactory->createView("Tutorial");

        return new Response($this->viewCompiler->compile($this->view));
    }
}