<?php

namespace Symfony\Config;

require_once __DIR__.\DIRECTORY_SEPARATOR.'FosHttpCache'.\DIRECTORY_SEPARATOR.'CacheableConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'FosHttpCache'.\DIRECTORY_SEPARATOR.'CacheControlConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'FosHttpCache'.\DIRECTORY_SEPARATOR.'ProxyClientConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'FosHttpCache'.\DIRECTORY_SEPARATOR.'CacheManagerConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'FosHttpCache'.\DIRECTORY_SEPARATOR.'TagsConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'FosHttpCache'.\DIRECTORY_SEPARATOR.'InvalidationConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'FosHttpCache'.\DIRECTORY_SEPARATOR.'UserContextConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'FosHttpCache'.\DIRECTORY_SEPARATOR.'FlashMessageConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'FosHttpCache'.\DIRECTORY_SEPARATOR.'TestConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'FosHttpCache'.\DIRECTORY_SEPARATOR.'DebugConfig.php';

use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class FosHttpCacheConfig implements \Symfony\Component\Config\Builder\ConfigBuilderInterface
{
    private $cacheable;
    private $cacheControl;
    private $proxyClient;
    private $cacheManager;
    private $tags;
    private $invalidation;
    private $userContext;
    private $flashMessage;
    private $test;
    private $debug;
    private $_usedProperties = [];

    public function cacheable(array $value = []): \Symfony\Config\FosHttpCache\CacheableConfig
    {
        if (null === $this->cacheable) {
            $this->_usedProperties['cacheable'] = true;
            $this->cacheable = new \Symfony\Config\FosHttpCache\CacheableConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "cacheable()" has already been initialized. You cannot pass values the second time you call cacheable().');
        }

        return $this->cacheable;
    }

    public function cacheControl(array $value = []): \Symfony\Config\FosHttpCache\CacheControlConfig
    {
        if (null === $this->cacheControl) {
            $this->_usedProperties['cacheControl'] = true;
            $this->cacheControl = new \Symfony\Config\FosHttpCache\CacheControlConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "cacheControl()" has already been initialized. You cannot pass values the second time you call cacheControl().');
        }

        return $this->cacheControl;
    }

    public function proxyClient(array $value = []): \Symfony\Config\FosHttpCache\ProxyClientConfig
    {
        if (null === $this->proxyClient) {
            $this->_usedProperties['proxyClient'] = true;
            $this->proxyClient = new \Symfony\Config\FosHttpCache\ProxyClientConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "proxyClient()" has already been initialized. You cannot pass values the second time you call proxyClient().');
        }

        return $this->proxyClient;
    }

    /**
     * @return \Symfony\Config\FosHttpCache\CacheManagerConfig|$this
     */
    public function cacheManager($value = [])
    {
        if (!\is_array($value)) {
            $this->_usedProperties['cacheManager'] = true;
            $this->cacheManager = $value;

            return $this;
        }

        if (!$this->cacheManager instanceof \Symfony\Config\FosHttpCache\CacheManagerConfig) {
            $this->_usedProperties['cacheManager'] = true;
            $this->cacheManager = new \Symfony\Config\FosHttpCache\CacheManagerConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "cacheManager()" has already been initialized. You cannot pass values the second time you call cacheManager().');
        }

        return $this->cacheManager;
    }

    public function tags(array $value = []): \Symfony\Config\FosHttpCache\TagsConfig
    {
        if (null === $this->tags) {
            $this->_usedProperties['tags'] = true;
            $this->tags = new \Symfony\Config\FosHttpCache\TagsConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "tags()" has already been initialized. You cannot pass values the second time you call tags().');
        }

        return $this->tags;
    }

    public function invalidation(array $value = []): \Symfony\Config\FosHttpCache\InvalidationConfig
    {
        if (null === $this->invalidation) {
            $this->_usedProperties['invalidation'] = true;
            $this->invalidation = new \Symfony\Config\FosHttpCache\InvalidationConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "invalidation()" has already been initialized. You cannot pass values the second time you call invalidation().');
        }

        return $this->invalidation;
    }

    /**
     * @return \Symfony\Config\FosHttpCache\UserContextConfig|$this
     */
    public function userContext($value = [])
    {
        if (!\is_array($value)) {
            $this->_usedProperties['userContext'] = true;
            $this->userContext = $value;

            return $this;
        }

        if (!$this->userContext instanceof \Symfony\Config\FosHttpCache\UserContextConfig) {
            $this->_usedProperties['userContext'] = true;
            $this->userContext = new \Symfony\Config\FosHttpCache\UserContextConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "userContext()" has already been initialized. You cannot pass values the second time you call userContext().');
        }

        return $this->userContext;
    }

    /**
     * @return \Symfony\Config\FosHttpCache\FlashMessageConfig|$this
     */
    public function flashMessage($value = [])
    {
        if (!\is_array($value)) {
            $this->_usedProperties['flashMessage'] = true;
            $this->flashMessage = $value;

            return $this;
        }

        if (!$this->flashMessage instanceof \Symfony\Config\FosHttpCache\FlashMessageConfig) {
            $this->_usedProperties['flashMessage'] = true;
            $this->flashMessage = new \Symfony\Config\FosHttpCache\FlashMessageConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "flashMessage()" has already been initialized. You cannot pass values the second time you call flashMessage().');
        }

        return $this->flashMessage;
    }

    public function test(array $value = []): \Symfony\Config\FosHttpCache\TestConfig
    {
        if (null === $this->test) {
            $this->_usedProperties['test'] = true;
            $this->test = new \Symfony\Config\FosHttpCache\TestConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "test()" has already been initialized. You cannot pass values the second time you call test().');
        }

        return $this->test;
    }

    /**
     * @return \Symfony\Config\FosHttpCache\DebugConfig|$this
     */
    public function debug($value = [])
    {
        if (!\is_array($value)) {
            $this->_usedProperties['debug'] = true;
            $this->debug = $value;

            return $this;
        }

        if (!$this->debug instanceof \Symfony\Config\FosHttpCache\DebugConfig) {
            $this->_usedProperties['debug'] = true;
            $this->debug = new \Symfony\Config\FosHttpCache\DebugConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "debug()" has already been initialized. You cannot pass values the second time you call debug().');
        }

        return $this->debug;
    }

    public function getExtensionAlias(): string
    {
        return 'fos_http_cache';
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('cacheable', $value)) {
            $this->_usedProperties['cacheable'] = true;
            $this->cacheable = new \Symfony\Config\FosHttpCache\CacheableConfig($value['cacheable']);
            unset($value['cacheable']);
        }

        if (array_key_exists('cache_control', $value)) {
            $this->_usedProperties['cacheControl'] = true;
            $this->cacheControl = new \Symfony\Config\FosHttpCache\CacheControlConfig($value['cache_control']);
            unset($value['cache_control']);
        }

        if (array_key_exists('proxy_client', $value)) {
            $this->_usedProperties['proxyClient'] = true;
            $this->proxyClient = new \Symfony\Config\FosHttpCache\ProxyClientConfig($value['proxy_client']);
            unset($value['proxy_client']);
        }

        if (array_key_exists('cache_manager', $value)) {
            $this->_usedProperties['cacheManager'] = true;
            $this->cacheManager = \is_array($value['cache_manager']) ? new \Symfony\Config\FosHttpCache\CacheManagerConfig($value['cache_manager']) : $value['cache_manager'];
            unset($value['cache_manager']);
        }

        if (array_key_exists('tags', $value)) {
            $this->_usedProperties['tags'] = true;
            $this->tags = new \Symfony\Config\FosHttpCache\TagsConfig($value['tags']);
            unset($value['tags']);
        }

        if (array_key_exists('invalidation', $value)) {
            $this->_usedProperties['invalidation'] = true;
            $this->invalidation = new \Symfony\Config\FosHttpCache\InvalidationConfig($value['invalidation']);
            unset($value['invalidation']);
        }

        if (array_key_exists('user_context', $value)) {
            $this->_usedProperties['userContext'] = true;
            $this->userContext = \is_array($value['user_context']) ? new \Symfony\Config\FosHttpCache\UserContextConfig($value['user_context']) : $value['user_context'];
            unset($value['user_context']);
        }

        if (array_key_exists('flash_message', $value)) {
            $this->_usedProperties['flashMessage'] = true;
            $this->flashMessage = \is_array($value['flash_message']) ? new \Symfony\Config\FosHttpCache\FlashMessageConfig($value['flash_message']) : $value['flash_message'];
            unset($value['flash_message']);
        }

        if (array_key_exists('test', $value)) {
            $this->_usedProperties['test'] = true;
            $this->test = new \Symfony\Config\FosHttpCache\TestConfig($value['test']);
            unset($value['test']);
        }

        if (array_key_exists('debug', $value)) {
            $this->_usedProperties['debug'] = true;
            $this->debug = \is_array($value['debug']) ? new \Symfony\Config\FosHttpCache\DebugConfig($value['debug']) : $value['debug'];
            unset($value['debug']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['cacheable'])) {
            $output['cacheable'] = $this->cacheable->toArray();
        }
        if (isset($this->_usedProperties['cacheControl'])) {
            $output['cache_control'] = $this->cacheControl->toArray();
        }
        if (isset($this->_usedProperties['proxyClient'])) {
            $output['proxy_client'] = $this->proxyClient->toArray();
        }
        if (isset($this->_usedProperties['cacheManager'])) {
            $output['cache_manager'] = $this->cacheManager instanceof \Symfony\Config\FosHttpCache\CacheManagerConfig ? $this->cacheManager->toArray() : $this->cacheManager;
        }
        if (isset($this->_usedProperties['tags'])) {
            $output['tags'] = $this->tags->toArray();
        }
        if (isset($this->_usedProperties['invalidation'])) {
            $output['invalidation'] = $this->invalidation->toArray();
        }
        if (isset($this->_usedProperties['userContext'])) {
            $output['user_context'] = $this->userContext instanceof \Symfony\Config\FosHttpCache\UserContextConfig ? $this->userContext->toArray() : $this->userContext;
        }
        if (isset($this->_usedProperties['flashMessage'])) {
            $output['flash_message'] = $this->flashMessage instanceof \Symfony\Config\FosHttpCache\FlashMessageConfig ? $this->flashMessage->toArray() : $this->flashMessage;
        }
        if (isset($this->_usedProperties['test'])) {
            $output['test'] = $this->test->toArray();
        }
        if (isset($this->_usedProperties['debug'])) {
            $output['debug'] = $this->debug instanceof \Symfony\Config\FosHttpCache\DebugConfig ? $this->debug->toArray() : $this->debug;
        }

        return $output;
    }

}
