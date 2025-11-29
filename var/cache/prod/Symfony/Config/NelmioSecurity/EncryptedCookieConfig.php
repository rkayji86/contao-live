<?php

namespace Symfony\Config\NelmioSecurity;

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class EncryptedCookieConfig 
{
    private $names;
    private $secret;
    private $algorithm;
    private $_usedProperties = [];

    /**
     * @param ParamConfigurator|list<mixed|ParamConfigurator> $value
     * @return $this
     */
    public function names($value): self
    {
        $this->_usedProperties['names'] = true;
        $this->names = $value;

        return $this;
    }

    /**
     * @default '%kernel.secret%'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function secret($value): self
    {
        $this->_usedProperties['secret'] = true;
        $this->secret = $value;

        return $this;
    }

    /**
     * @default 'rijndael-128'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function algorithm($value): self
    {
        $this->_usedProperties['algorithm'] = true;
        $this->algorithm = $value;

        return $this;
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('names', $value)) {
            $this->_usedProperties['names'] = true;
            $this->names = $value['names'];
            unset($value['names']);
        }

        if (array_key_exists('secret', $value)) {
            $this->_usedProperties['secret'] = true;
            $this->secret = $value['secret'];
            unset($value['secret']);
        }

        if (array_key_exists('algorithm', $value)) {
            $this->_usedProperties['algorithm'] = true;
            $this->algorithm = $value['algorithm'];
            unset($value['algorithm']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['names'])) {
            $output['names'] = $this->names;
        }
        if (isset($this->_usedProperties['secret'])) {
            $output['secret'] = $this->secret;
        }
        if (isset($this->_usedProperties['algorithm'])) {
            $output['algorithm'] = $this->algorithm;
        }

        return $output;
    }

}
