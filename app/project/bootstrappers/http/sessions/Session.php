<?php
/**
 * Copyright (C) 2015 David Young
 * 
 * Defines the session bootstrapper
 */
namespace Project\Bootstrappers\HTTP\Sessions;
use RDev\Files\FileSystem;
use RDev\Framework\Bootstrappers\HTTP\Sessions\Session as BaseSession;
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
     * @return ISession The session to use
     */
    protected function getSession()
    {
        $this->loadConfig();
        $session = new RDevSession();
        $session->setName($this->config["name"]);

        return $session;
    }

    /**
     * Gets the session handler object to use
     *
     * @return SessionHandlerInterface The session handler to use
     */
    protected function getSessionHandler()
    {
        $this->loadConfig();

        return new FileSessionHandler(new FileSystem(), $this->config["filePath"]);
    }

    /**
     * Loads the configuration array
     */
    private function loadConfig()
    {
        if($this->config === null)
        {
            $this->config = require $this->paths["configs"] . "/http/session.php";;
        }
    }
}