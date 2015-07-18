<?php
/**
 * Defines the edit page template builder
 */
namespace Project\HTTP\Views\Builders;
use Opulence\Views\IBuilder;
use Opulence\Views\ITemplate;

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