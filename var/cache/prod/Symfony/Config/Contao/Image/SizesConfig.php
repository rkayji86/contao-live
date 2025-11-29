<?php

namespace Symfony\Config\Contao\Image;

require_once __DIR__.\DIRECTORY_SEPARATOR.'SizesConfig'.\DIRECTORY_SEPARATOR.'ItemsConfig.php';

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class SizesConfig 
{
    private $width;
    private $height;
    private $resizeMode;
    private $zoom;
    private $cssClass;
    private $lazyLoading;
    private $densities;
    private $sizes;
    private $skipIfDimensionsMatch;
    private $formats;
    private $items;
    private $resizeMode;
    private $cssClass;
    private $lazyLoading;
    private $skipIfDimensionsMatch;
    private $_usedProperties = [];

    /**
     * @default null
     * @param ParamConfigurator|int $value
     * @return $this
     */
    public function width($value): self
    {
        $this->_usedProperties['width'] = true;
        $this->width = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|int $value
     * @return $this
     */
    public function height($value): self
    {
        $this->_usedProperties['height'] = true;
        $this->height = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|'crop'|'box'|'proportional' $value
     * @return $this
     */
    public function resizeMode($value): self
    {
        $this->_usedProperties['resizeMode'] = true;
        $this->resizeMode = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|int $value
     * @return $this
     */
    public function zoom($value): self
    {
        $this->_usedProperties['zoom'] = true;
        $this->zoom = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function cssClass($value): self
    {
        $this->_usedProperties['cssClass'] = true;
        $this->cssClass = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function lazyLoading($value): self
    {
        $this->_usedProperties['lazyLoading'] = true;
        $this->lazyLoading = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function densities($value): self
    {
        $this->_usedProperties['densities'] = true;
        $this->densities = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function sizes($value): self
    {
        $this->_usedProperties['sizes'] = true;
        $this->sizes = $value;

        return $this;
    }

    /**
     * If the output dimensions match the source dimensions, the image will not be processed. Instead, the original file will be used.
     * @default null
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function skipIfDimensionsMatch($value): self
    {
        $this->_usedProperties['skipIfDimensionsMatch'] = true;
        $this->skipIfDimensionsMatch = $value;

        return $this;
    }

    /**
     * @param ParamConfigurator|array $value
     * @return $this
     */
    public function formats(string $source, $value): self
    {
        $this->_usedProperties['formats'] = true;
        $this->formats[$source] = $value;

        return $this;
    }

    public function items(array $value = []): \Symfony\Config\Contao\Image\SizesConfig\ItemsConfig
    {
        $this->_usedProperties['items'] = true;

        return $this->items[] = new \Symfony\Config\Contao\Image\SizesConfig\ItemsConfig($value);
    }

    /**
     * @default null
     * @param ParamConfigurator|'crop'|'box'|'proportional' $value
     * @deprecated Using contao.image.sizes.*.resizeMode is deprecated. Please use contao.image.sizes.*.resize_mode instead.
     * @return $this
     */
    public function resizeMode($value): self
    {
        $this->_usedProperties['resizeMode'] = true;
        $this->resizeMode = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @deprecated Using contao.image.sizes.*.cssClass is deprecated. Please use contao.image.sizes.*.css_class instead.
     * @return $this
     */
    public function cssClass($value): self
    {
        $this->_usedProperties['cssClass'] = true;
        $this->cssClass = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|bool $value
     * @deprecated Using contao.image.sizes.*.lazyLoading is deprecated. Please use contao.image.sizes.*.lazy_loading instead.
     * @return $this
     */
    public function lazyLoading($value): self
    {
        $this->_usedProperties['lazyLoading'] = true;
        $this->lazyLoading = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|bool $value
     * @deprecated Using contao.image.sizes.*.skipIfDimensionsMatch is deprecated. Please use contao.image.sizes.*.skip_if_dimensions_match instead.
     * @return $this
     */
    public function skipIfDimensionsMatch($value): self
    {
        $this->_usedProperties['skipIfDimensionsMatch'] = true;
        $this->skipIfDimensionsMatch = $value;

        return $this;
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('width', $value)) {
            $this->_usedProperties['width'] = true;
            $this->width = $value['width'];
            unset($value['width']);
        }

        if (array_key_exists('height', $value)) {
            $this->_usedProperties['height'] = true;
            $this->height = $value['height'];
            unset($value['height']);
        }

        if (array_key_exists('resize_mode', $value)) {
            $this->_usedProperties['resizeMode'] = true;
            $this->resizeMode = $value['resize_mode'];
            unset($value['resize_mode']);
        }

        if (array_key_exists('zoom', $value)) {
            $this->_usedProperties['zoom'] = true;
            $this->zoom = $value['zoom'];
            unset($value['zoom']);
        }

        if (array_key_exists('css_class', $value)) {
            $this->_usedProperties['cssClass'] = true;
            $this->cssClass = $value['css_class'];
            unset($value['css_class']);
        }

        if (array_key_exists('lazy_loading', $value)) {
            $this->_usedProperties['lazyLoading'] = true;
            $this->lazyLoading = $value['lazy_loading'];
            unset($value['lazy_loading']);
        }

        if (array_key_exists('densities', $value)) {
            $this->_usedProperties['densities'] = true;
            $this->densities = $value['densities'];
            unset($value['densities']);
        }

        if (array_key_exists('sizes', $value)) {
            $this->_usedProperties['sizes'] = true;
            $this->sizes = $value['sizes'];
            unset($value['sizes']);
        }

        if (array_key_exists('skip_if_dimensions_match', $value)) {
            $this->_usedProperties['skipIfDimensionsMatch'] = true;
            $this->skipIfDimensionsMatch = $value['skip_if_dimensions_match'];
            unset($value['skip_if_dimensions_match']);
        }

        if (array_key_exists('formats', $value)) {
            $this->_usedProperties['formats'] = true;
            $this->formats = $value['formats'];
            unset($value['formats']);
        }

        if (array_key_exists('items', $value)) {
            $this->_usedProperties['items'] = true;
            $this->items = array_map(function ($v) { return new \Symfony\Config\Contao\Image\SizesConfig\ItemsConfig($v); }, $value['items']);
            unset($value['items']);
        }

        if (array_key_exists('resizeMode', $value)) {
            $this->_usedProperties['resizeMode'] = true;
            $this->resizeMode = $value['resizeMode'];
            unset($value['resizeMode']);
        }

        if (array_key_exists('cssClass', $value)) {
            $this->_usedProperties['cssClass'] = true;
            $this->cssClass = $value['cssClass'];
            unset($value['cssClass']);
        }

        if (array_key_exists('lazyLoading', $value)) {
            $this->_usedProperties['lazyLoading'] = true;
            $this->lazyLoading = $value['lazyLoading'];
            unset($value['lazyLoading']);
        }

        if (array_key_exists('skipIfDimensionsMatch', $value)) {
            $this->_usedProperties['skipIfDimensionsMatch'] = true;
            $this->skipIfDimensionsMatch = $value['skipIfDimensionsMatch'];
            unset($value['skipIfDimensionsMatch']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['width'])) {
            $output['width'] = $this->width;
        }
        if (isset($this->_usedProperties['height'])) {
            $output['height'] = $this->height;
        }
        if (isset($this->_usedProperties['resizeMode'])) {
            $output['resize_mode'] = $this->resizeMode;
        }
        if (isset($this->_usedProperties['zoom'])) {
            $output['zoom'] = $this->zoom;
        }
        if (isset($this->_usedProperties['cssClass'])) {
            $output['css_class'] = $this->cssClass;
        }
        if (isset($this->_usedProperties['lazyLoading'])) {
            $output['lazy_loading'] = $this->lazyLoading;
        }
        if (isset($this->_usedProperties['densities'])) {
            $output['densities'] = $this->densities;
        }
        if (isset($this->_usedProperties['sizes'])) {
            $output['sizes'] = $this->sizes;
        }
        if (isset($this->_usedProperties['skipIfDimensionsMatch'])) {
            $output['skip_if_dimensions_match'] = $this->skipIfDimensionsMatch;
        }
        if (isset($this->_usedProperties['formats'])) {
            $output['formats'] = $this->formats;
        }
        if (isset($this->_usedProperties['items'])) {
            $output['items'] = array_map(function ($v) { return $v->toArray(); }, $this->items);
        }
        if (isset($this->_usedProperties['resizeMode'])) {
            $output['resizeMode'] = $this->resizeMode;
        }
        if (isset($this->_usedProperties['cssClass'])) {
            $output['cssClass'] = $this->cssClass;
        }
        if (isset($this->_usedProperties['lazyLoading'])) {
            $output['lazyLoading'] = $this->lazyLoading;
        }
        if (isset($this->_usedProperties['skipIfDimensionsMatch'])) {
            $output['skipIfDimensionsMatch'] = $this->skipIfDimensionsMatch;
        }

        return $output;
    }

}
