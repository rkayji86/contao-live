<?php

namespace ContentElements\Elements;

use Contao\BackendTemplate;
use Contao\ContentElement;

class ImageTextBox extends ContentElement
{
    protected $strTemplate = 'ce_imagetextbox';

    public function generate()
    {
        if (TL_MODE == 'BE') {
            $template = new BackendTemplate('be_wildcard');
            $template->wildcard = '<strong>' . $this->element_headline . '</strong><br>' . $this->element_text;
            return $template->parse();
        }

        return parent::generate();
    }

    protected function compile()
    {
    }
}