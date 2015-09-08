<?php
/**
 * Defines the edit page template builder
 */
namespace Project\HTTP\Views\Builders;
use Opulence\Views\Factories\IViewBuilder;
use Opulence\Views\IView;

class Edit implements IViewBuilder
{
    /**
     * {@inheritdoc}
     */
    public function build(IView $template)
    {
        $template->setVar("title", "Editing This Project");

        return $template;
    }
}