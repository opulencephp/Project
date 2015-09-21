<?php
/**
 * Defines the view builders bootstrapper
 */
namespace Project\Bootstrappers\HTTP\Views;
use Project\HTTP\Views\Builders\Home;
use Project\HTTP\Views\Builders\Master;
use Opulence\Applications\Bootstrappers\Bootstrapper;
use Opulence\Views\Factories\IViewFactory;

class Builders extends Bootstrapper
{
    /**
     * Registers view builders to the factory
     *
     * @param IViewFactory $templateFactory The template factory to use
     */
    public function run(IViewFactory $templateFactory)
    {
        $templateFactory->registerBuilder("Master", function()
        {
            return new Master();
        });
        $templateFactory->registerBuilder("Home", function()
        {
            return new Home();
        });
    }
}