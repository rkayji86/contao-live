<?php

namespace Symfony\Config\Terminal42UrlRewrite\EntriesConfig;

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class ResponseConfig 
{
    private $code;
    private $uri;
    private $_usedProperties = [];

    /**
     * The response code.
     * @default 301
     * @param ParamConfigurator|int $value
     * @return $this
     */
    public function code($value): self
    {
        $this->_usedProperties['code'] = true;
        $this->code = $value;

        return $this;
    }

    /**
     * The response redirect URI. Irrelevant if response code is set to 410.
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function uri($value): self
    {
        $this->_usedProperties['uri'] = true;
        $this->uri = $value;

        return $this;
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('code', $value)) {
            $this->_usedProperties['code'] = true;
            $this->code = $value['code'];
            unset($value['code']);
        }

        if (array_key_exists('uri', $value)) {
            $this->_usedProperties['uri'] = true;
            $this->uri = $value['uri'];
            unset($value['uri']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['code'])) {
            $output['code'] = $this->code;
        }
        if (isset($this->_usedProperties['uri'])) {
            $output['uri'] = $this->uri;
        }

        return $output;
    }

}
