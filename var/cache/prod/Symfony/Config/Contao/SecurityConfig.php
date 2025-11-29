<?php

namespace Symfony\Config\Contao;

require_once __DIR__.\DIRECTORY_SEPARATOR.'Security'.\DIRECTORY_SEPARATOR.'TwoFactorConfig.php';

use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class SecurityConfig 
{
    private $twoFactor;
    private $_usedProperties = [];

    public function twoFactor(array $value = []): \Symfony\Config\Contao\Security\TwoFactorConfig
    {
        if (null === $this->twoFactor) {
            $this->_usedProperties['twoFactor'] = true;
            $this->twoFactor = new \Symfony\Config\Contao\Security\TwoFactorConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "twoFactor()" has already been initialized. You cannot pass values the second time you call twoFactor().');
        }

        return $this->twoFactor;
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('two_factor', $value)) {
            $this->_usedProperties['twoFactor'] = true;
            $this->twoFactor = new \Symfony\Config\Contao\Security\TwoFactorConfig($value['two_factor']);
            unset($value['two_factor']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['twoFactor'])) {
            $output['two_factor'] = $this->twoFactor->toArray();
        }

        return $output;
    }

}
