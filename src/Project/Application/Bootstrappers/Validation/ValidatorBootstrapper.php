<?php
namespace Project\Application\Bootstrappers\Validation;

use Opulence\Framework\Configuration\Config;
use Opulence\Framework\Validation\Bootstrappers\ValidatorBootstrapper as BaseBootstrapper;
use Opulence\Validation\Rules\Errors\ErrorTemplateRegistry;
use Opulence\Validation\Rules\RuleExtensionRegistry;

/**
 * Defines the validator bootstrapper
 */
class ValidatorBootstrapper extends BaseBootstrapper
{
    /**
     * Registers the error templates
     *
     * @param ErrorTemplateRegistry $errorTemplateRegistry The registry to register to
     */
    protected function registerErrorTemplates(ErrorTemplateRegistry $errorTemplateRegistry)
    {
        $errorTemplateRegistry->registerErrorTemplatesFromConfig(
            require Config::get("paths", "resources.lang.en") . "/validation.php"
        );
    }

    /**
     * Registers any custom rule extensions
     *
     * @param RuleExtensionRegistry $ruleExtensionRegistry The registry to register rules to
     */
    protected function registerRuleExtensions(RuleExtensionRegistry $ruleExtensionRegistry)
    {
        // Register any custom rules here
    }
}