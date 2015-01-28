<?php
/**
 * Copyright (C) 2015 David Young
 *
 * Defines the view builders bootstrapper
 */
namespace Project\Bootstrappers\HTTP\Views;
use Project\HTTP\Views\Builders as ViewBuilders;
use RDev\Applications\Bootstrappers;
use RDev\Views\Factories;

class Builders extends Bootstrappers\Bootstrapper
{
    /**
     * Registers view builders to the factory
     *
     * @param Factories\ITemplateFactory $templateFactory The template factory to use
     */
    public function run(Factories\ITemplateFactory $templateFactory)
    {
        $templateFactory->registerBuilder("Master.php", function()
        {
            return new ViewBuilders\Master();
        });
        $templateFactory->registerBuilder("Home.php", function()
        {
            return new ViewBuilders\Home();
        });
        $templateFactory->registerBuilder("Edit.php", function()
        {
            return new ViewBuilders\Edit();
        });
    }
}