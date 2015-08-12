<?php
/**
 * Defines the home page template builder
 */
namespace Project\HTTP\Views\Builders;
use Opulence\Views\IBuilder;
use Opulence\Views\IView;

class Home implements IBuilder
{
    /**
     * {@inheritdoc}
     */
    public function build(IView $template)
    {
        $template->setVar("title", "My First Opulence Application");

        return $template;
    }
}