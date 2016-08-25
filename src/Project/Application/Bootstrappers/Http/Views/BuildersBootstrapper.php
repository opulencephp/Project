<?php
namespace Project\Application\Bootstrappers\Http\Views;

use Opulence\Ioc\Bootstrappers\Bootstrapper;
use Opulence\Views\Factories\IViewFactory;
use Opulence\Views\IView;
use Project\Application\Http\Views\Builders\HtmlErrorBuilder;
use Project\Application\Http\Views\Builders\TutorialBuilder;
use Project\Application\Http\Views\Builders\MasterBuilder;

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
        $viewFactory->registerBuilder("Tutorial", function (IView $view) {
            return (new TutorialBuilder())->build($view);
        });
        $viewFactory->registerBuilder("errors/html/Error", function (IView $view) {
            return (new HtmlErrorBuilder())->build($view);
        });
    }
}