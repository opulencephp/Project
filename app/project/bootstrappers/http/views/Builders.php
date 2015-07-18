<?php
/**
 * Defines the view builders bootstrapper
 */
namespace Project\Bootstrappers\HTTP\Views;
use Project\HTTP\Views\Builders\Edit;
use Project\HTTP\Views\Builders\Home;
use Project\HTTP\Views\Builders\Master;
use Opulence\Applications\Bootstrappers\Bootstrapper;
use Opulence\Views\Factories\ITemplateFactory;

class Builders extends Bootstrapper
{
    /**
     * Registers view builders to the factory
     *
     * @param ITemplateFactory $templateFactory The template factory to use
     */
    public function run(ITemplateFactory $templateFactory)
    {
        $templateFactory->registerBuilder("Master.php", function()
        {
            return new Master();
        });
        $templateFactory->registerBuilder("Home.php", function()
        {
            return new Home();
        });
        $templateFactory->registerBuilder("Edit.php", function()
        {
            return new Edit();
        });
    }
}