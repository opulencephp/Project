<?php
namespace Project\Http\Views\Builders;

use Opulence\Views\Factories\IViewBuilder;
use Opulence\Views\IView;

/**
 * Defines the master view builder
 */
class MasterBuilder implements IViewBuilder
{
    /**
     * @inheritdoc
     */
    public function build(IView $view)
    {
        // Default to empty meta data
        $view->setVar("metaKeywords", []);
        $view->setVar("metaDescription", "");
        // Set default variable values
        $view->setVar("css", "/assets/css/style.css");

        return $view;
    }
}