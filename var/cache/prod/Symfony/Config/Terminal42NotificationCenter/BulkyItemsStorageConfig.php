<?php

namespace Symfony\Config\Terminal42NotificationCenter;

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class BulkyItemsStorageConfig 
{
    private $retentionPeriod;
    private $_usedProperties = [];

    /**
     * The number of days for which bulky items are kept in storage.
     * @default 7
     * @param ParamConfigurator|int $value
     * @return $this
     */
    public function retentionPeriod($value): self
    {
        $this->_usedProperties['retentionPeriod'] = true;
        $this->retentionPeriod = $value;

        return $this;
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('retention_period', $value)) {
            $this->_usedProperties['retentionPeriod'] = true;
            $this->retentionPeriod = $value['retention_period'];
            unset($value['retention_period']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['retentionPeriod'])) {
            $output['retention_period'] = $this->retentionPeriod;
        }

        return $output;
    }

}
