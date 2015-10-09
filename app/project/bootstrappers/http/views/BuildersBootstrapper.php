<?php
/**
 * Defines the view builders bootstrapper
 */
namespace Project\Bootstrappers\HTTP\Views;

use Project\HTTP\Views\Builders\HomeBuilder;
use Project\HTTP\Views\Builders\MasterBuilder;
use Opulence\Applications\Bootstrappers\Bootstrapper;
use Opulence\Views\Factories\IViewFactory;
use Opulence\Views\IView;

class BuildersBootstrapper extends Bootstrapper
{
    /**
     * Registers view builders to the factory
     *
     * @param IViewFactory $viewFactory The view factory to use
     */
    public function run(IViewFactory $viewFactory)
    {
        $viewFactory->registerBuilder("Master", function (IView $view) {
            return (new MasterBuilder())->build($view);
        });
        $viewFactory->registerBuilder("Home", function (IView $view) {
            return (new HomeBuilder())->build($view);
        });
    }
}