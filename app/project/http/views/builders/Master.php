<?php
/**
 * Defines the master template builder
 */
namespace Project\HTTP\Views\Builders;
use RDev\Views\IBuilder;
use RDev\Views\ITemplate;

class Master implements IBuilder
{
    /**
     * {@inheritdoc}
     */
    public function build(ITemplate $template)
    {
        // Default to empty meta data
        $template->setVar("metaKeywords", []);
        $template->setVar("metaDescription", "");
        // Set default variable values
        $template->setVar("css", "assets/css/style.css");

        return $template;
    }
}