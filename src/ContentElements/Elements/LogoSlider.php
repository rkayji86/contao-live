<?php

namespace ContentElements\Elements;

use Contao\ContentElement;
use Contao\BackendTemplate;

class LogoSlider extends ContentElement
{
    protected $strTemplate = 'ce_logoslider';

    public function generate()
    {
        if (TL_MODE == 'BE') {
            $template = new BackendTemplate('be_wildcard');
            $template->wildcard = '## Logoslider ##';
            return $template->parse();
        }

        return parent::generate();
    }

    protected function compile()
    {
    }
}
