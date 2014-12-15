<?php
/**
 * Copyright (C) 2014 David Young
 * 
 * Defines the master template builder
 */
namespace Project\Views\Builders;
use RDev\Views;

class Master implements Views\IBuilder
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