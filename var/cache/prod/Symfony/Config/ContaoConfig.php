<?php

namespace Symfony\Config;

require_once __DIR__.\DIRECTORY_SEPARATOR.'Contao'.\DIRECTORY_SEPARATOR.'IntlConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'Contao'.\DIRECTORY_SEPARATOR.'ImageConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'Contao'.\DIRECTORY_SEPARATOR.'SecurityConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'Contao'.\DIRECTORY_SEPARATOR.'SearchConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'Contao'.\DIRECTORY_SEPARATOR.'CrawlConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'Contao'.\DIRECTORY_SEPARATOR.'MailerConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'Contao'.\DIRECTORY_SEPARATOR.'BackendConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'Contao'.\DIRECTORY_SEPARATOR.'InsertTagsConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'Contao'.\DIRECTORY_SEPARATOR.'BackupConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'Contao'.\DIRECTORY_SEPARATOR.'SanitizerConfig.php';

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class ContaoConfig implements \Symfony\Component\Config\Builder\ConfigBuilderInterface
{
    private $csrfCookiePrefix;
    private $csrfTokenName;
    private $encryptionKey;
    private $errorLevel;
    private $intl;
    private $legacyRouting;
    private $localconfig;
    private $locales;
    private $prependLocale;
    private $prettyErrorScreens;
    private $previewScript;
    private $uploadPath;
    private $editableFiles;
    private $urlSuffix;
    private $webDir;
    private $image;
    private $security;
    private $search;
    private $crawl;
    private $mailer;
    private $backend;
    private $insertTags;
    private $backup;
    private $sanitizer;
    private $_usedProperties = [];

    /**
     * @default 'csrf_'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function csrfCookiePrefix($value): self
    {
        $this->_usedProperties['csrfCookiePrefix'] = true;
        $this->csrfCookiePrefix = $value;

        return $this;
    }

    /**
     * @default 'contao_csrf_token'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function csrfTokenName($value): self
    {
        $this->_usedProperties['csrfTokenName'] = true;
        $this->csrfTokenName = $value;

        return $this;
    }

    /**
     * @default '%kernel.secret%'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function encryptionKey($value): self
    {
        $this->_usedProperties['encryptionKey'] = true;
        $this->encryptionKey = $value;

        return $this;
    }

    /**
     * The error reporting level set when the framework is initialized. Defaults to E_ALL & ~E_NOTICE & ~E_DEPRECATED & ~E_USER_DEPRECATED.
     * @default 8183
     * @param ParamConfigurator|int $value
     * @return $this
     */
    public function errorLevel($value): self
    {
        $this->_usedProperties['errorLevel'] = true;
        $this->errorLevel = $value;

        return $this;
    }

    public function intl(array $value = []): \Symfony\Config\Contao\IntlConfig
    {
        if (null === $this->intl) {
            $this->_usedProperties['intl'] = true;
            $this->intl = new \Symfony\Config\Contao\IntlConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "intl()" has already been initialized. You cannot pass values the second time you call intl().');
        }

        return $this->intl;
    }

    /**
     * Disabling legacy routing allows to configure the URL prefix and suffix per root page. However, it might not be compatible with third-party extensions.
     * @default true
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function legacyRouting($value): self
    {
        $this->_usedProperties['legacyRouting'] = true;
        $this->legacyRouting = $value;

        return $this;
    }

    /**
     * Allows to set TL_CONFIG variables, overriding settings stored in localconfig.php. Changes in the Contao back end will not have any effect.
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function localconfig($value): self
    {
        $this->_usedProperties['localconfig'] = true;
        $this->localconfig = $value;

        return $this;
    }

    /**
     * @param ParamConfigurator|list<mixed|ParamConfigurator> $value
     * @return $this
     */
    public function locales($value): self
    {
        $this->_usedProperties['locales'] = true;
        $this->locales = $value;

        return $this;
    }

    /**
     * Whether or not to add the page language to the URL.
     * @default false
     * @param ParamConfigurator|bool $value
     * @deprecated The URL prefix is configured per root page since Contao 4.10. Using this option requires legacy routing.
     * @return $this
     */
    public function prependLocale($value): self
    {
        $this->_usedProperties['prependLocale'] = true;
        $this->prependLocale = $value;

        return $this;
    }

    /**
     * Show customizable, pretty error screens instead of the default PHP error messages.
     * @default false
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function prettyErrorScreens($value): self
    {
        $this->_usedProperties['prettyErrorScreens'] = true;
        $this->prettyErrorScreens = $value;

        return $this;
    }

    /**
     * An optional entry point script that bypasses the front end cache for previewing changes (e.g. "/preview.php").
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function previewScript($value): self
    {
        $this->_usedProperties['previewScript'] = true;
        $this->previewScript = $value;

        return $this;
    }

    /**
     * The folder used by the file manager.
     * @default 'files'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function uploadPath($value): self
    {
        $this->_usedProperties['uploadPath'] = true;
        $this->uploadPath = $value;

        return $this;
    }

    /**
     * @default 'css,csv,html,ini,js,json,less,md,scss,svg,svgz,ts,txt,xliff,xml,yml,yaml'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function editableFiles($value): self
    {
        $this->_usedProperties['editableFiles'] = true;
        $this->editableFiles = $value;

        return $this;
    }

    /**
     * @default '.html'
     * @param ParamConfigurator|mixed $value
     * @deprecated The URL suffix is configured per root page since Contao 4.10. Using this option requires legacy routing.
     * @return $this
     */
    public function urlSuffix($value): self
    {
        $this->_usedProperties['urlSuffix'] = true;
        $this->urlSuffix = $value;

        return $this;
    }

    /**
     * Absolute path to the web directory. Defaults to %kernel.project_dir%/public.
     * @default '/var/www/html/contao-live/public'
     * @param ParamConfigurator|mixed $value
     * @deprecated Setting the web directory in a config file is deprecated. Use the "extra.public-dir" config key in your root composer.json instead.
     * @return $this
     */
    public function webDir($value): self
    {
        $this->_usedProperties['webDir'] = true;
        $this->webDir = $value;

        return $this;
    }

    public function image(array $value = []): \Symfony\Config\Contao\ImageConfig
    {
        if (null === $this->image) {
            $this->_usedProperties['image'] = true;
            $this->image = new \Symfony\Config\Contao\ImageConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "image()" has already been initialized. You cannot pass values the second time you call image().');
        }

        return $this->image;
    }

    public function security(array $value = []): \Symfony\Config\Contao\SecurityConfig
    {
        if (null === $this->security) {
            $this->_usedProperties['security'] = true;
            $this->security = new \Symfony\Config\Contao\SecurityConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "security()" has already been initialized. You cannot pass values the second time you call security().');
        }

        return $this->security;
    }

    public function search(array $value = []): \Symfony\Config\Contao\SearchConfig
    {
        if (null === $this->search) {
            $this->_usedProperties['search'] = true;
            $this->search = new \Symfony\Config\Contao\SearchConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "search()" has already been initialized. You cannot pass values the second time you call search().');
        }

        return $this->search;
    }

    public function crawl(array $value = []): \Symfony\Config\Contao\CrawlConfig
    {
        if (null === $this->crawl) {
            $this->_usedProperties['crawl'] = true;
            $this->crawl = new \Symfony\Config\Contao\CrawlConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "crawl()" has already been initialized. You cannot pass values the second time you call crawl().');
        }

        return $this->crawl;
    }

    public function mailer(array $value = []): \Symfony\Config\Contao\MailerConfig
    {
        if (null === $this->mailer) {
            $this->_usedProperties['mailer'] = true;
            $this->mailer = new \Symfony\Config\Contao\MailerConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "mailer()" has already been initialized. You cannot pass values the second time you call mailer().');
        }

        return $this->mailer;
    }

    public function backend(array $value = []): \Symfony\Config\Contao\BackendConfig
    {
        if (null === $this->backend) {
            $this->_usedProperties['backend'] = true;
            $this->backend = new \Symfony\Config\Contao\BackendConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "backend()" has already been initialized. You cannot pass values the second time you call backend().');
        }

        return $this->backend;
    }

    public function insertTags(array $value = []): \Symfony\Config\Contao\InsertTagsConfig
    {
        if (null === $this->insertTags) {
            $this->_usedProperties['insertTags'] = true;
            $this->insertTags = new \Symfony\Config\Contao\InsertTagsConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "insertTags()" has already been initialized. You cannot pass values the second time you call insertTags().');
        }

        return $this->insertTags;
    }

    public function backup(array $value = []): \Symfony\Config\Contao\BackupConfig
    {
        if (null === $this->backup) {
            $this->_usedProperties['backup'] = true;
            $this->backup = new \Symfony\Config\Contao\BackupConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "backup()" has already been initialized. You cannot pass values the second time you call backup().');
        }

        return $this->backup;
    }

    public function sanitizer(array $value = []): \Symfony\Config\Contao\SanitizerConfig
    {
        if (null === $this->sanitizer) {
            $this->_usedProperties['sanitizer'] = true;
            $this->sanitizer = new \Symfony\Config\Contao\SanitizerConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "sanitizer()" has already been initialized. You cannot pass values the second time you call sanitizer().');
        }

        return $this->sanitizer;
    }

    public function getExtensionAlias(): string
    {
        return 'contao';
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('csrf_cookie_prefix', $value)) {
            $this->_usedProperties['csrfCookiePrefix'] = true;
            $this->csrfCookiePrefix = $value['csrf_cookie_prefix'];
            unset($value['csrf_cookie_prefix']);
        }

        if (array_key_exists('csrf_token_name', $value)) {
            $this->_usedProperties['csrfTokenName'] = true;
            $this->csrfTokenName = $value['csrf_token_name'];
            unset($value['csrf_token_name']);
        }

        if (array_key_exists('encryption_key', $value)) {
            $this->_usedProperties['encryptionKey'] = true;
            $this->encryptionKey = $value['encryption_key'];
            unset($value['encryption_key']);
        }

        if (array_key_exists('error_level', $value)) {
            $this->_usedProperties['errorLevel'] = true;
            $this->errorLevel = $value['error_level'];
            unset($value['error_level']);
        }

        if (array_key_exists('intl', $value)) {
            $this->_usedProperties['intl'] = true;
            $this->intl = new \Symfony\Config\Contao\IntlConfig($value['intl']);
            unset($value['intl']);
        }

        if (array_key_exists('legacy_routing', $value)) {
            $this->_usedProperties['legacyRouting'] = true;
            $this->legacyRouting = $value['legacy_routing'];
            unset($value['legacy_routing']);
        }

        if (array_key_exists('localconfig', $value)) {
            $this->_usedProperties['localconfig'] = true;
            $this->localconfig = $value['localconfig'];
            unset($value['localconfig']);
        }

        if (array_key_exists('locales', $value)) {
            $this->_usedProperties['locales'] = true;
            $this->locales = $value['locales'];
            unset($value['locales']);
        }

        if (array_key_exists('prepend_locale', $value)) {
            $this->_usedProperties['prependLocale'] = true;
            $this->prependLocale = $value['prepend_locale'];
            unset($value['prepend_locale']);
        }

        if (array_key_exists('pretty_error_screens', $value)) {
            $this->_usedProperties['prettyErrorScreens'] = true;
            $this->prettyErrorScreens = $value['pretty_error_screens'];
            unset($value['pretty_error_screens']);
        }

        if (array_key_exists('preview_script', $value)) {
            $this->_usedProperties['previewScript'] = true;
            $this->previewScript = $value['preview_script'];
            unset($value['preview_script']);
        }

        if (array_key_exists('upload_path', $value)) {
            $this->_usedProperties['uploadPath'] = true;
            $this->uploadPath = $value['upload_path'];
            unset($value['upload_path']);
        }

        if (array_key_exists('editable_files', $value)) {
            $this->_usedProperties['editableFiles'] = true;
            $this->editableFiles = $value['editable_files'];
            unset($value['editable_files']);
        }

        if (array_key_exists('url_suffix', $value)) {
            $this->_usedProperties['urlSuffix'] = true;
            $this->urlSuffix = $value['url_suffix'];
            unset($value['url_suffix']);
        }

        if (array_key_exists('web_dir', $value)) {
            $this->_usedProperties['webDir'] = true;
            $this->webDir = $value['web_dir'];
            unset($value['web_dir']);
        }

        if (array_key_exists('image', $value)) {
            $this->_usedProperties['image'] = true;
            $this->image = new \Symfony\Config\Contao\ImageConfig($value['image']);
            unset($value['image']);
        }

        if (array_key_exists('security', $value)) {
            $this->_usedProperties['security'] = true;
            $this->security = new \Symfony\Config\Contao\SecurityConfig($value['security']);
            unset($value['security']);
        }

        if (array_key_exists('search', $value)) {
            $this->_usedProperties['search'] = true;
            $this->search = new \Symfony\Config\Contao\SearchConfig($value['search']);
            unset($value['search']);
        }

        if (array_key_exists('crawl', $value)) {
            $this->_usedProperties['crawl'] = true;
            $this->crawl = new \Symfony\Config\Contao\CrawlConfig($value['crawl']);
            unset($value['crawl']);
        }

        if (array_key_exists('mailer', $value)) {
            $this->_usedProperties['mailer'] = true;
            $this->mailer = new \Symfony\Config\Contao\MailerConfig($value['mailer']);
            unset($value['mailer']);
        }

        if (array_key_exists('backend', $value)) {
            $this->_usedProperties['backend'] = true;
            $this->backend = new \Symfony\Config\Contao\BackendConfig($value['backend']);
            unset($value['backend']);
        }

        if (array_key_exists('insert_tags', $value)) {
            $this->_usedProperties['insertTags'] = true;
            $this->insertTags = new \Symfony\Config\Contao\InsertTagsConfig($value['insert_tags']);
            unset($value['insert_tags']);
        }

        if (array_key_exists('backup', $value)) {
            $this->_usedProperties['backup'] = true;
            $this->backup = new \Symfony\Config\Contao\BackupConfig($value['backup']);
            unset($value['backup']);
        }

        if (array_key_exists('sanitizer', $value)) {
            $this->_usedProperties['sanitizer'] = true;
            $this->sanitizer = new \Symfony\Config\Contao\SanitizerConfig($value['sanitizer']);
            unset($value['sanitizer']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['csrfCookiePrefix'])) {
            $output['csrf_cookie_prefix'] = $this->csrfCookiePrefix;
        }
        if (isset($this->_usedProperties['csrfTokenName'])) {
            $output['csrf_token_name'] = $this->csrfTokenName;
        }
        if (isset($this->_usedProperties['encryptionKey'])) {
            $output['encryption_key'] = $this->encryptionKey;
        }
        if (isset($this->_usedProperties['errorLevel'])) {
            $output['error_level'] = $this->errorLevel;
        }
        if (isset($this->_usedProperties['intl'])) {
            $output['intl'] = $this->intl->toArray();
        }
        if (isset($this->_usedProperties['legacyRouting'])) {
            $output['legacy_routing'] = $this->legacyRouting;
        }
        if (isset($this->_usedProperties['localconfig'])) {
            $output['localconfig'] = $this->localconfig;
        }
        if (isset($this->_usedProperties['locales'])) {
            $output['locales'] = $this->locales;
        }
        if (isset($this->_usedProperties['prependLocale'])) {
            $output['prepend_locale'] = $this->prependLocale;
        }
        if (isset($this->_usedProperties['prettyErrorScreens'])) {
            $output['pretty_error_screens'] = $this->prettyErrorScreens;
        }
        if (isset($this->_usedProperties['previewScript'])) {
            $output['preview_script'] = $this->previewScript;
        }
        if (isset($this->_usedProperties['uploadPath'])) {
            $output['upload_path'] = $this->uploadPath;
        }
        if (isset($this->_usedProperties['editableFiles'])) {
            $output['editable_files'] = $this->editableFiles;
        }
        if (isset($this->_usedProperties['urlSuffix'])) {
            $output['url_suffix'] = $this->urlSuffix;
        }
        if (isset($this->_usedProperties['webDir'])) {
            $output['web_dir'] = $this->webDir;
        }
        if (isset($this->_usedProperties['image'])) {
            $output['image'] = $this->image->toArray();
        }
        if (isset($this->_usedProperties['security'])) {
            $output['security'] = $this->security->toArray();
        }
        if (isset($this->_usedProperties['search'])) {
            $output['search'] = $this->search->toArray();
        }
        if (isset($this->_usedProperties['crawl'])) {
            $output['crawl'] = $this->crawl->toArray();
        }
        if (isset($this->_usedProperties['mailer'])) {
            $output['mailer'] = $this->mailer->toArray();
        }
        if (isset($this->_usedProperties['backend'])) {
            $output['backend'] = $this->backend->toArray();
        }
        if (isset($this->_usedProperties['insertTags'])) {
            $output['insert_tags'] = $this->insertTags->toArray();
        }
        if (isset($this->_usedProperties['backup'])) {
            $output['backup'] = $this->backup->toArray();
        }
        if (isset($this->_usedProperties['sanitizer'])) {
            $output['sanitizer'] = $this->sanitizer->toArray();
        }

        return $output;
    }

}
