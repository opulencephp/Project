<?php
/**
 * Copyright (C) 2014 David Young
 * 
 * Defines an example template builder
 */
namespace Project\Views\Builders;
use RDev\Views;

class Example implements Views\IBuilder
{
    /**
     * {@inheritdoc}
     */
    public function build(Views\ITemplate $template)
    {
        $template->setTag("projectName", "My First RDev Project");
        $template->setVar("css", "assets/css/style.css");

        return $template;
    }
}