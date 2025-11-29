<?php

namespace ContentElements\Elements;

use Contao\BackendTemplate;
use Contao\ContentElement;
use Contao\StringUtil;
use Contao\System;

class ImageVideoElement extends ContentElement
{
    const TYPE = 'image_video';
    const PALETTE = '{type_legend},type;{image_legend},singleSRC,alt,img_link,img_linkblank;{source_legend},videoSRC,customSingleSRC;{invisible_legend:hide},invisible,start,stop';

    /**
     * Template
     * 
     * @var string
     */
    protected $strTemplate = 'ce_' . self::TYPE;

    public function generate()
    {
        $GLOBALS['TL_CSS'][self::TYPE] = 'bundles/contentelements/' . self::TYPE . '.css|static';

        return parent::generate();
    }

    public function compile()
    {
        if ($this->isBackendRequest()) {
            $this->strTemplate = 'be_wildcard';
            $this->Template = new BackendTemplate($this->strTemplate);
            $this->Template->wildcard = '### ' . $this->headline . ' ###';
        } else {
            $this->Template->gwReasons = StringUtil::deserialize($this->gwReasons);
        }
    }

    protected function isBackendRequest()
    {
        $request = System::getContainer()->get('request_stack')->getCurrentRequest();
        return $request && System::getContainer()->get('contao.routing.scope_matcher')->isBackendRequest($request);
    }
}
