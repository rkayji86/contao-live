<?php

namespace Symfony\Config\Terminal42UrlRewrite\EntriesConfig;

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class RequestConfig 
{
    private $path;
    private $hosts;
    private $requirements;
    private $condition;
    private $_usedProperties = [];

    /**
     * The request path to match.
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function path($value): self
    {
        $this->_usedProperties['path'] = true;
        $this->path = $value;

        return $this;
    }

    /**
     * @param ParamConfigurator|list<mixed|ParamConfigurator> $value
     * @return $this
     */
    public function hosts($value): self
    {
        $this->_usedProperties['hosts'] = true;
        $this->hosts = $value;

        return $this;
    }

    /**
     * @param ParamConfigurator|list<mixed|ParamConfigurator> $value
     * @return $this
     */
    public function requirements($value): self
    {
        $this->_usedProperties['requirements'] = true;
        $this->requirements = $value;

        return $this;
    }

    /**
     * Request condition in Symfony's Expression Language to match.
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function condition($value): self
    {
        $this->_usedProperties['condition'] = true;
        $this->condition = $value;

        return $this;
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('path', $value)) {
            $this->_usedProperties['path'] = true;
            $this->path = $value['path'];
            unset($value['path']);
        }

        if (array_key_exists('hosts', $value)) {
            $this->_usedProperties['hosts'] = true;
            $this->hosts = $value['hosts'];
            unset($value['hosts']);
        }

        if (array_key_exists('requirements', $value)) {
            $this->_usedProperties['requirements'] = true;
            $this->requirements = $value['requirements'];
            unset($value['requirements']);
        }

        if (array_key_exists('condition', $value)) {
            $this->_usedProperties['condition'] = true;
            $this->condition = $value['condition'];
            unset($value['condition']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['path'])) {
            $output['path'] = $this->path;
        }
        if (isset($this->_usedProperties['hosts'])) {
            $output['hosts'] = $this->hosts;
        }
        if (isset($this->_usedProperties['requirements'])) {
            $output['requirements'] = $this->requirements;
        }
        if (isset($this->_usedProperties['condition'])) {
            $output['condition'] = $this->condition;
        }

        return $output;
    }

}
