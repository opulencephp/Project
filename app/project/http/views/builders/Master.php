<?php
/**
 * Copyright (C) 2015 David Young
 * 
 * Defines the master template builder
 */
namespace Project\HTTP\Views\Builders;
use RDev\Views;

class Master implements Views\IBuilder
{
    /**
     * {@inheritdoc}
     */
    public function build(Views\ITemplate $template)
    {
        // Default to empty meta keywords
        $template->setVar("metaKeywords", []);
        $template->setVar("css", "assets/css/style.css");

        return $template;
    }
}