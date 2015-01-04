<?php
/**
 * Copyright (C) 2015 David Young
 *
 * Defines the home page template builder
 */
namespace Project\HTTP\Views\Builders;
use RDev\Views;

class Home implements Views\IBuilder
{
    /**
     * {@inheritdoc}
     */
    public function build(Views\ITemplate $template)
    {
        $template->setVar("title", "My First RDev Application");

        return $template;
    }
}