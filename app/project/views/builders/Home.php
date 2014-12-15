<?php
/**
 * Copyright (C) 2014 David Young
 *
 * Defines the home page template builder
 */
namespace Project\Views\Builders;
use RDev\Views;

class Home implements Views\IBuilder
{
    /**
     * {@inheritdoc}
     */
    public function build(Views\ITemplate $template)
    {
        $template->setVar("title", "First RDev Application");

        return $template;
    }
}