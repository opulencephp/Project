<?php
namespace Project\Bootstrappers\Events;

use Opulence\Framework\Bootstrappers\Events\DispatcherBootstrapper as BaseBootstrapper;

/**
 * Defines the event dispatcher bootstrapper
 */
class DispatcherBootstrapper extends BaseBootstrapper
{
    /**
     * Gets the list of event names to the list of listeners, which can be callables or "className@method" strings
     *
     * @return array The event listener config
     */
    protected function getEventListenerConfig()
    {
        return require "{$this->paths["config"]}/events.php";
    }
}