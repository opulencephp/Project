<?php
/**
 * Defines the Redis bootstrapper
 */
namespace Project\Bootstrappers\Databases;

use Opulence\Applications\Bootstrappers\Bootstrapper;
use Opulence\Applications\Bootstrappers\ILazyBootstrapper;
use Opulence\IoC\IContainer;
use Opulence\Redis\IRedis;
use Opulence\Redis\OpulencePHPRedis;
use Opulence\Redis\Server;
use Opulence\Redis\TypeMapper;

class Redis extends Bootstrapper implements ILazyBootstrapper
{
    /**
     * @inheritdoc
     */
    public function getBindings()
    {
        return [IRedis::class];
    }

    /**
     * @inheritdoc
     */
    public function registerBindings(IContainer $container)
    {
        $redis = new OpulencePHPRedis(
            new Server(
                $this->environment->getVar("REDIS_HOST"),
                $this->environment->getVar("REDIS_PASSWORD"),
                $this->environment->getVar("REDIS_PORT")
            ),
            new TypeMapper()
        );
        $container->bind([IRedis::class, OpulencePHPRedis::class], $redis);
    }
}