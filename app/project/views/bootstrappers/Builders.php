<?php
/**
 * Copyright (C) 2014 David Young
 *
 * Defines the view builders bootstrapper
 */
namespace Project\Views\Bootstrappers;
use Project\Views\Builders as ViewBuilders;
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
        $this->templateFactory->registerBuilder("Example.html", function()
        {
            return new ViewBuilders\Example();
        });
    }
}