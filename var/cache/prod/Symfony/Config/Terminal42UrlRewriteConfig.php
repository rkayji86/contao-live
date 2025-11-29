<?php

namespace Symfony\Config;

require_once __DIR__.\DIRECTORY_SEPARATOR.'Terminal42UrlRewrite'.\DIRECTORY_SEPARATOR.'EntriesConfig.php';

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class Terminal42UrlRewriteConfig implements \Symfony\Component\Config\Builder\ConfigBuilderInterface
{
    private $backendManagement;
    private $entries;
    private $_usedProperties = [];

    /**
     * Enable the rewrites management in Contao backend.
     * @default true
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function backendManagement($value): self
    {
        $this->_usedProperties['backendManagement'] = true;
        $this->backendManagement = $value;

        return $this;
    }

    public function entries(array $value = []): \Symfony\Config\Terminal42UrlRewrite\EntriesConfig
    {
        $this->_usedProperties['entries'] = true;

        return $this->entries[] = new \Symfony\Config\Terminal42UrlRewrite\EntriesConfig($value);
    }

    public function getExtensionAlias(): string
    {
        return 'terminal42_url_rewrite';
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('backend_management', $value)) {
            $this->_usedProperties['backendManagement'] = true;
            $this->backendManagement = $value['backend_management'];
            unset($value['backend_management']);
        }

        if (array_key_exists('entries', $value)) {
            $this->_usedProperties['entries'] = true;
            $this->entries = array_map(function ($v) { return new \Symfony\Config\Terminal42UrlRewrite\EntriesConfig($v); }, $value['entries']);
            unset($value['entries']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['backendManagement'])) {
            $output['backend_management'] = $this->backendManagement;
        }
        if (isset($this->_usedProperties['entries'])) {
            $output['entries'] = array_map(function ($v) { return $v->toArray(); }, $this->entries);
        }

        return $output;
    }

}
