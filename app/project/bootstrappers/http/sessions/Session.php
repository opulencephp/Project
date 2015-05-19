<?php
/**
 * Defines the session bootstrapper
 */
namespace Project\Bootstrappers\HTTP\Sessions;
use RDev\Framework\Bootstrappers\HTTP\Sessions\Session as BaseSession;
use RDev\IoC\IContainer;
use RDev\Sessions\Handlers\FileSessionHandler;
use RDev\Sessions\ISession;
use RDev\Sessions\Session as RDevSession;
use SessionHandlerInterface;

class Session extends BaseSession
{
    /** @var array|null The config array */
    private $config = null;

    /**
     * Gets the session object to use
     *
     * @param IContainer $container The IoC Container
     * @return ISession The session to use
     */
    protected function getSession(IContainer $container)
    {
        $this->loadConfig();
        $session = new RDevSession();
        $session->setName($this->config["name"]);

        return $session;
    }

    /**
     * Gets the session handler object to use
     *
     * @param IContainer $container The IoC Container
     * @return SessionHandlerInterface The session handler to use
     */
    protected function getSessionHandler(IContainer $container)
    {
        $this->loadConfig();
        $handlerClass = $this->environment->getVariable("SESSION_HANDLER");

        switch($handlerClass)
        {
            default:
                return $container->makeShared(FileSessionHandler::class, [$this->config["file.path"]]);
        }
    }

    /**
     * Loads the configuration array
     */
    private function loadConfig()
    {
        if($this->config === null)
        {
            $this->config = require $this->paths["configs"] . "/http/sessions.php";;
        }
    }
}