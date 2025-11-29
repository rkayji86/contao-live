<?php

namespace Symfony\Config\Contao;

require_once __DIR__.\DIRECTORY_SEPARATOR.'Image'.\DIRECTORY_SEPARATOR.'ImagineOptionsConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'Image'.\DIRECTORY_SEPARATOR.'SizesConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'Image'.\DIRECTORY_SEPARATOR.'PreviewConfig.php';

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class ImageConfig 
{
    private $bypassCache;
    private $imagineOptions;
    private $imagineService;
    private $rejectLargeUploads;
    private $sizes;
    private $targetDir;
    private $targetPath;
    private $validExtensions;
    private $preview;
    private $_usedProperties = [];

    /**
     * Bypass the image cache and always regenerate images when requested. This also disables deferred image resizing.
     * @default false
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function bypassCache($value): self
    {
        $this->_usedProperties['bypassCache'] = true;
        $this->bypassCache = $value;

        return $this;
    }

    public function imagineOptions(array $value = []): \Symfony\Config\Contao\Image\ImagineOptionsConfig
    {
        if (null === $this->imagineOptions) {
            $this->_usedProperties['imagineOptions'] = true;
            $this->imagineOptions = new \Symfony\Config\Contao\Image\ImagineOptionsConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "imagineOptions()" has already been initialized. You cannot pass values the second time you call imagineOptions().');
        }

        return $this->imagineOptions;
    }

    /**
     * Contao automatically uses an Imagine service out of Gmagick, Imagick and Gd (in this order). Set a service ID here to override.
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function imagineService($value): self
    {
        $this->_usedProperties['imagineService'] = true;
        $this->imagineService = $value;

        return $this;
    }

    /**
     * Reject uploaded images exceeding the localconfig.gdMaxImgWidth and localconfig.gdMaxImgHeight dimensions.
     * @default false
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function rejectLargeUploads($value): self
    {
        $this->_usedProperties['rejectLargeUploads'] = true;
        $this->rejectLargeUploads = $value;

        return $this;
    }

    public function sizes(string $name, array $value = []): \Symfony\Config\Contao\Image\SizesConfig
    {
        if (!isset($this->sizes[$name])) {
            $this->_usedProperties['sizes'] = true;
            $this->sizes[$name] = new \Symfony\Config\Contao\Image\SizesConfig($value);
        } elseif (1 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "sizes()" has already been initialized. You cannot pass values the second time you call sizes().');
        }

        return $this->sizes[$name];
    }

    /**
     * The target directory for the cached images processed by Contao.
     * @example %kernel.project_dir%/assets/images
     * @default '/var/www/html/contao-live/assets/images'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function targetDir($value): self
    {
        $this->_usedProperties['targetDir'] = true;
        $this->targetDir = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @deprecated Use the "contao.image.target_dir" parameter instead.
     * @return $this
     */
    public function targetPath($value): self
    {
        $this->_usedProperties['targetPath'] = true;
        $this->targetPath = $value;

        return $this;
    }

    /**
     * @param ParamConfigurator|list<mixed|ParamConfigurator> $value
     * @return $this
     */
    public function validExtensions($value): self
    {
        $this->_usedProperties['validExtensions'] = true;
        $this->validExtensions = $value;

        return $this;
    }

    public function preview(array $value = []): \Symfony\Config\Contao\Image\PreviewConfig
    {
        if (null === $this->preview) {
            $this->_usedProperties['preview'] = true;
            $this->preview = new \Symfony\Config\Contao\Image\PreviewConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "preview()" has already been initialized. You cannot pass values the second time you call preview().');
        }

        return $this->preview;
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('bypass_cache', $value)) {
            $this->_usedProperties['bypassCache'] = true;
            $this->bypassCache = $value['bypass_cache'];
            unset($value['bypass_cache']);
        }

        if (array_key_exists('imagine_options', $value)) {
            $this->_usedProperties['imagineOptions'] = true;
            $this->imagineOptions = new \Symfony\Config\Contao\Image\ImagineOptionsConfig($value['imagine_options']);
            unset($value['imagine_options']);
        }

        if (array_key_exists('imagine_service', $value)) {
            $this->_usedProperties['imagineService'] = true;
            $this->imagineService = $value['imagine_service'];
            unset($value['imagine_service']);
        }

        if (array_key_exists('reject_large_uploads', $value)) {
            $this->_usedProperties['rejectLargeUploads'] = true;
            $this->rejectLargeUploads = $value['reject_large_uploads'];
            unset($value['reject_large_uploads']);
        }

        if (array_key_exists('sizes', $value)) {
            $this->_usedProperties['sizes'] = true;
            $this->sizes = array_map(function ($v) { return new \Symfony\Config\Contao\Image\SizesConfig($v); }, $value['sizes']);
            unset($value['sizes']);
        }

        if (array_key_exists('target_dir', $value)) {
            $this->_usedProperties['targetDir'] = true;
            $this->targetDir = $value['target_dir'];
            unset($value['target_dir']);
        }

        if (array_key_exists('target_path', $value)) {
            $this->_usedProperties['targetPath'] = true;
            $this->targetPath = $value['target_path'];
            unset($value['target_path']);
        }

        if (array_key_exists('valid_extensions', $value)) {
            $this->_usedProperties['validExtensions'] = true;
            $this->validExtensions = $value['valid_extensions'];
            unset($value['valid_extensions']);
        }

        if (array_key_exists('preview', $value)) {
            $this->_usedProperties['preview'] = true;
            $this->preview = new \Symfony\Config\Contao\Image\PreviewConfig($value['preview']);
            unset($value['preview']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['bypassCache'])) {
            $output['bypass_cache'] = $this->bypassCache;
        }
        if (isset($this->_usedProperties['imagineOptions'])) {
            $output['imagine_options'] = $this->imagineOptions->toArray();
        }
        if (isset($this->_usedProperties['imagineService'])) {
            $output['imagine_service'] = $this->imagineService;
        }
        if (isset($this->_usedProperties['rejectLargeUploads'])) {
            $output['reject_large_uploads'] = $this->rejectLargeUploads;
        }
        if (isset($this->_usedProperties['sizes'])) {
            $output['sizes'] = array_map(function ($v) { return $v->toArray(); }, $this->sizes);
        }
        if (isset($this->_usedProperties['targetDir'])) {
            $output['target_dir'] = $this->targetDir;
        }
        if (isset($this->_usedProperties['targetPath'])) {
            $output['target_path'] = $this->targetPath;
        }
        if (isset($this->_usedProperties['validExtensions'])) {
            $output['valid_extensions'] = $this->validExtensions;
        }
        if (isset($this->_usedProperties['preview'])) {
            $output['preview'] = $this->preview->toArray();
        }

        return $output;
    }

}
