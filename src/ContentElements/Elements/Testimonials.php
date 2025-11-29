<?php


namespace ContentElements\Elements;

use Contao;
use Contao\System;
use Contao\StringUtil;
use Contao\ContentElement;
use Contao\BackendTemplate;

class Testimonials extends ContentElement
{
    protected $strTemplate = 'ce_testimonials';

    public function generate()
    {
        if (TL_MODE == 'BE') {
            $template = new BackendTemplate('be_wildcard');
            $template->wildcard = '<span style="text-transform: none"><strong>' . $this->headline . '</strong><br>' . $this->text . '</span>';
            return $template->parse();
        }


        $GLOBALS['TL_JAVASCRIPT']['splide'] = 'bundles/contentelements/splide.min.js|static';
        $GLOBALS['TL_CSS']['splide'] = 'bundles/contentelements/splide.min.css|static';
        $GLOBALS['TL_CSS']['testimonials'] = 'bundles/contentelements/testimonials.css|static';

        $projectDir = System::getContainer()->getParameter('kernel.project_dir');
        $initScript = \file_get_contents($projectDir . '/public/bundles/contentelements/init-testimonials-slider.js');
        $initScript = str_replace('__id__', $this->id, $initScript);
        $GLOBALS['TL_JAVASCRIPT_QUEUE']['slider_' . $this->id] = $initScript;

        $this->testimonials = StringUtil::deserialize($this->testimonials);


        return parent::generate();
    }

    protected function compile()
    {
    }
}
