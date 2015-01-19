<?php
/**
 * Copyright (C) 2015 David Young
 *
 * Defines the view builders bootstrapper
 */
namespace Project\HTTP\Views\Bootstrappers;
use Project\HTTP\Views\Builders as ViewBuilders;
use RDev\Applications\Bootstrappers;
use RDev\Views\Factories;

class Builders implements Bootstrappers\IBootstrapper
{
    /** @var Factories\ITemplateFactory The template factory to use */
    private $templateFactory = null;

    /**
     * @param Factories\ITemplateFactory $templateFactory The template factory to use
     */
    public function __construct(Factories\ITemplateFactory $templateFactory)
    {
        $this->templateFactory = $templateFactory;
    }

    /**
     * {@inheritdoc}
     */
    public function run()
    {
        $this->templateFactory->registerBuilder("Master.php", function()
        {
            return new ViewBuilders\Master();
        });
        $this->templateFactory->registerBuilder("Home.php", function()
        {
            return new ViewBuilders\Home();
        });
        $this->templateFactory->registerBuilder("Edit.php", function()
        {
            return new ViewBuilders\Edit();
        });
    }
}