<?php

namespace ContentElements\Elements;

use Contao\BackendTemplate;
use Contao\ContentElement;
use Contao\StringUtil;
use Contao\System;

class ReasonsElement extends ContentElement
{
    const TYPE = 'reasons';
    const PALETTE = '{type_legend},type,headline;{text_legend},text;{image_legend},add_image;{source_legend},vimeo;{reasons_legend},gwReasons;{button_legend},add_button;{invisible_legend:hide},invisible,start,stop';

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
