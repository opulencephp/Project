<?php
/**
 * Copyright (C) 2015 David Young
 *
 * Defines the edit page template builder
 */
namespace Project\HTTP\Views\Builders;
use RDev\Views\IBuilder;
use RDev\Views\ITemplate;

class Edit implements IBuilder
{
    /**
     * {@inheritdoc}
     */
    public function build(ITemplate $template)
    {
        $template->setVar("title", "Editing This Project");

        return $template;
    }
}