<?php
/**
 * Defines the view builders bootstrapper
 */
namespace Project\Bootstrappers\HTTP\Views;

use Project\HTTP\Views\Builders\HomeBuilder;
use Project\HTTP\Views\Builders\MasterBuilder;
use Opulence\Applications\Bootstrappers\Bootstrapper;
use Opulence\Views\Factories\IViewFactory;

class Builders extends Bootstrapper
{
    /**
     * Registers view builders to the factory
     *
     * @param IViewFactory $viewFactory The view factory to use
     */
    public function run(IViewFactory $viewFactory)
    {
        $viewFactory->registerBuilder("Master", function()
        {
            return new MasterBuilder();
        });
        $viewFactory->registerBuilder("Home", function()
        {
            return new HomeBuilder();
        });
    }
}