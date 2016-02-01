<?php
namespace Project\Http\Middleware;

use Opulence\Framework\Http\Middleware\Session as BaseSession;
use Opulence\Http\Responses\Cookie;
use Opulence\Http\Responses\Response;

/**
 * Defines the session middleware
 */
class Session extends BaseSession
{
    /** @var array|null The config array */
    private $config = null;

    /**
     * Runs garbage collection, if necessary
     */
    protected function gc()
    {
        $this->loadConfig();

        if (rand(1, $this->config["gc.divisor"]) <= $this->config["gc.chance"]) {
            $this->sessionHandler->gc($this->config["lifetime"]);
        }
    }

    /**
     * Writes any session data needed in the response
     *
     * @param Response $response The response to write to
     * @return Response The response with data written to it
     */
    protected function writeToResponse(Response $response) : Response
    {
        $this->loadConfig();
        $response->getHeaders()->setCookie(
            new Cookie(
                $this->session->getName(),
                $this->session->getId(),
                time() + $this->config["lifetime"],
                $this->config["cookie.path"],
                $this->config["cookie.domain"],
                $this->config["cookie.isSecure"],
                false
            )
        );

        return $response;
    }

    /**
     * Loads the configuration array
     */
    private function loadConfig()
    {
        if ($this->config === null) {
            $this->config = require "{$this->paths["config.http"]}/sessions.php";
        }
    }
}