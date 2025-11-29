<?php

namespace Symfony\Config;

require_once __DIR__.\DIRECTORY_SEPARATOR.'Terminal42NotificationCenter'.\DIRECTORY_SEPARATOR.'BulkyItemsStorageConfig.php';

use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class Terminal42NotificationCenterConfig implements \Symfony\Component\Config\Builder\ConfigBuilderInterface
{
    private $bulkyItemsStorage;
    private $_usedProperties = [];

    public function bulkyItemsStorage(array $value = []): \Symfony\Config\Terminal42NotificationCenter\BulkyItemsStorageConfig
    {
        if (null === $this->bulkyItemsStorage) {
            $this->_usedProperties['bulkyItemsStorage'] = true;
            $this->bulkyItemsStorage = new \Symfony\Config\Terminal42NotificationCenter\BulkyItemsStorageConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "bulkyItemsStorage()" has already been initialized. You cannot pass values the second time you call bulkyItemsStorage().');
        }

        return $this->bulkyItemsStorage;
    }

    public function getExtensionAlias(): string
    {
        return 'terminal42_notification_center';
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('bulky_items_storage', $value)) {
            $this->_usedProperties['bulkyItemsStorage'] = true;
            $this->bulkyItemsStorage = new \Symfony\Config\Terminal42NotificationCenter\BulkyItemsStorageConfig($value['bulky_items_storage']);
            unset($value['bulky_items_storage']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['bulkyItemsStorage'])) {
            $output['bulky_items_storage'] = $this->bulkyItemsStorage->toArray();
        }

        return $output;
    }

}
