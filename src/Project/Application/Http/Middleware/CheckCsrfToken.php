<?php
namespace Project\Application\Http\Middleware;

use Opulence\Framework\Http\CsrfTokenChecker;
use Opulence\Framework\Http\Middleware\CheckCsrfToken as BaseMiddleware;
use Opulence\Http\Responses\Cookie;
use Opulence\Http\Responses\Response;

/**
 * Defines the middleware that checks the CSRF token
 */
class CheckCsrfToken extends BaseMiddleware
{
    /** @var array|null The config array */
    private $config = null;

    /**
     * Writes data to the response
     *
     * @param Response $response The response to write to
     * @return Response The response with the data written to it
     */
    protected function writeToResponse(Response $response) : Response
    {
        $this->loadConfig();
        // Add an XSRF cookie for JavaScript frameworks to use
        $response->getHeaders()->setCookie(
            new Cookie(
                "XSRF-TOKEN",
                $this->session->get(CsrfTokenChecker::TOKEN_INPUT_NAME),
                time() + $this->config["xsrfcookie.lifetime"],
                $this->config["cookie.path"],
                $this->config["cookie.domain"],
                false,
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