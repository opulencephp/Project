<?php
/**
 * Copyright (C) 2014 David Young
 *
 * Defines the edit page template builder
 */
namespace Project\HTTP\Views\Builders;
use RDev\Views;

class Edit implements Views\IBuilder
{
    /**
     * {@inheritdoc}
     */
    public function build(Views\ITemplate $template)
    {
        $template->setVar("title", "Editing This Project");

        return $template;
    }
}