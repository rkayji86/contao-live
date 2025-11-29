<?php

namespace ContentElements\Elements;

use Contao\ContentElement;
use Contao\BackendTemplate;

class ThreeSteps extends ContentElement
{
    protected $strTemplate = 'ce_threesteps';

    public function generate()
    {
        if (TL_MODE == 'BE') {
            $template = new BackendTemplate('be_wildcard');
            $template->wildcard = '## 3 Schritte ##';
            return $template->parse();
        }

        return parent::generate();
    }

    protected function compile()
    {
    }
}
