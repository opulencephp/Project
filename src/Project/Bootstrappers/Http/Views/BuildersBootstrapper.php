<?php
namespace Project\Bootstrappers\Http\Views;

use Project\Http\Views\Builders\HomeBuilder;
use Project\Http\Views\Builders\MasterBuilder;
use Opulence\Bootstrappers\Bootstrapper;
use Opulence\Views\Factories\IViewFactory;
use Opulence\Views\IView;

/**
 * Defines the view builders bootstrapper
 */
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