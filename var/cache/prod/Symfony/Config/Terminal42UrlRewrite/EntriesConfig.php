<?php

namespace Symfony\Config\Terminal42UrlRewrite;

require_once __DIR__.\DIRECTORY_SEPARATOR.'EntriesConfig'.\DIRECTORY_SEPARATOR.'RequestConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'EntriesConfig'.\DIRECTORY_SEPARATOR.'ResponseConfig.php';

use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class EntriesConfig 
{
    private $request;
    private $response;
    private $_usedProperties = [];

    public function request(array $value = []): \Symfony\Config\Terminal42UrlRewrite\EntriesConfig\RequestConfig
    {
        if (null === $this->request) {
            $this->_usedProperties['request'] = true;
            $this->request = new \Symfony\Config\Terminal42UrlRewrite\EntriesConfig\RequestConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "request()" has already been initialized. You cannot pass values the second time you call request().');
        }

        return $this->request;
    }

    public function response(array $value = []): \Symfony\Config\Terminal42UrlRewrite\EntriesConfig\ResponseConfig
    {
        if (null === $this->response) {
            $this->_usedProperties['response'] = true;
            $this->response = new \Symfony\Config\Terminal42UrlRewrite\EntriesConfig\ResponseConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "response()" has already been initialized. You cannot pass values the second time you call response().');
        }

        return $this->response;
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('request', $value)) {
            $this->_usedProperties['request'] = true;
            $this->request = new \Symfony\Config\Terminal42UrlRewrite\EntriesConfig\RequestConfig($value['request']);
            unset($value['request']);
        }

        if (array_key_exists('response', $value)) {
            $this->_usedProperties['response'] = true;
            $this->response = new \Symfony\Config\Terminal42UrlRewrite\EntriesConfig\ResponseConfig($value['response']);
            unset($value['response']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['request'])) {
            $output['request'] = $this->request->toArray();
        }
        if (isset($this->_usedProperties['response'])) {
            $output['response'] = $this->response->toArray();
        }

        return $output;
    }

}
