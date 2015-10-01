<?php
/**
 * Defines the home page view builder
 */
namespace Project\HTTP\Views\Builders;

use Opulence\Views\Factories\IViewBuilder;
use Opulence\Views\IView;

class HomeBuilder implements IViewBuilder
{
    /**
     * @inheritdoc
     */
    public function build(IView $view)
    {
        $view->setVar("title", "My First Opulence Application");

        return $view;
    }
}