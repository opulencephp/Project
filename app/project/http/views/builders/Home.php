<?php
/**
 * Defines the home page template builder
 */
namespace Project\HTTP\Views\Builders;
use Opulence\Views\IBuilder;
use Opulence\Views\ITemplate;

class Home implements IBuilder
{
    /**
     * {@inheritdoc}
     */
    public function build(ITemplate $template)
    {
        $template->setVar("title", "My First Opulence Application");

        return $template;
    }
}