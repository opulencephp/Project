<?php
/**
 * Copyright (C) 2015 David Young
 *
 * Defines the home page template builder
 */
namespace Project\HTTP\Views\Builders;
use RDev\Views\IBuilder;
use RDev\Views\ITemplate;

class Home implements IBuilder
{
    /**
     * {@inheritdoc}
     */
    public function build(ITemplate $template)
    {
        $template->setVar("title", "My First RDev Application");

        return $template;
    }
}