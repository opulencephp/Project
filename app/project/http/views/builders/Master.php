<?php
/**
 * Defines the master template builder
 */
namespace Project\HTTP\Views\Builders;
use Opulence\Views\Factories\IViewBuilder;
use Opulence\Views\IView;

class Master implements IViewBuilder
{
    /**
     * {@inheritdoc}
     */
    public function build(IView $template)
    {
        // Default to empty meta data
        $template->setVar("metaKeywords", []);
        $template->setVar("metaDescription", "");
        // Set default variable values
        $template->setVar("css", "assets/css/style.css");

        return $template;
    }
}