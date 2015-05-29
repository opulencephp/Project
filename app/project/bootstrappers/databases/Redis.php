<?php
/**
 * Defines the Redis bootstrapper
 */
namespace Project\Bootstrappers\Databases;
use RDev\Applications\Bootstrappers\Bootstrapper;
use RDev\Applications\Bootstrappers\ILazyBootstrapper;
use RDev\IoC\IContainer;
use RDev\Redis\IRedis;
use RDev\Redis\RDevPHPRedis;
use RDev\Redis\Server;
use RDev\Redis\TypeMapper;

class Redis extends Bootstrapper implements ILazyBootstrapper
{
    /**
     * {@inheritdoc}
     */
    public function getBoundClasses()
    {
        return [IRedis::class];
    }

    /**
     * {@inheritdoc}
     */
    public function registerBindings(IContainer $container)
    {
        $redis = new RDevPHPRedis(
            new Server(
                $this->environment->getVariable("REDIS_HOST"),
                $this->environment->getVariable("REDIS_PASSWORD"),
                $this->environment->getVariable("REDIS_PORT")
            ),
            new TypeMapper()
        );
        $container->bind(IRedis::class, $redis);
    }
}