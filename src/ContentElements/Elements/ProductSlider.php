<?php

namespace ContentElements\Elements;

use Contao\ContentElement;
use Contao\BackendTemplate;

class ProductSlider extends ContentElement
{
    protected $strTemplate = 'ce_productslider';

    public function generate()
    {
        if (TL_MODE == 'BE') {
            $template = new BackendTemplate('be_wildcard');
            $template->wildcard = '## Produktslider ##';
            return $template->parse();
        }

        return parent::generate();
    }

    protected function compile()
    {
    }
}
