<?php

namespace ContentElements\Elements;

use Contao\System;
use Contao\PackageModel;
use Contao\ContentElement;
use Contao\BackendTemplate;
use Contao\PackageServiceModel;
use Contao\PackageFunctionModel;

class Packages extends ContentElement
{
    /**
     * Element type
     * @var string
     */
    public const TYPE = 'packages';

    /**
     * Palette
     * @var string
     */
    public const PALETTE = '{type_legend},type,headline;{text_legend},text;{button_legend},add_button;{settings_legend},distancetop;{expert_legend:hide},guests,cssID;{invisible_legend:hide},invisible,start,stop';

    /**
     * Template
     * @var string
     */
    protected $strTemplate = 'ce_' . self::TYPE;

    public function generate()
    {
        if (TL_MODE == 'BE') {
            $template = new BackendTemplate('be_wildcard');
            $template->wildcard = '## Pakete ##';
            return $template->parse();
        }

        $GLOBALS['TL_JAVASCRIPT']['splide'] = 'bundles/contentelements/splide.min.js|static';
        $GLOBALS['TL_CSS']['splide'] = 'bundles/contentelements/splide.min.css|static';
        $GLOBALS['TL_CSS'][self::TYPE] = 'bundles/contentelements/' . self::TYPE . '.css|static';

        $this->packages = PackageModel::findPublished();
        $this->packageServices = PackageServiceModel::findPublished();
        $this->packageFunctions = PackageFunctionModel::findPublished();

        return parent::generate();
    }

    protected function compile()
    {
        $projectDir = System::getContainer()->getParameter('kernel.project_dir');
        $initScript = \file_get_contents($projectDir . '/public/bundles/contentelements/init-package-slider.js');
        $initScript = str_replace('__id__', 'package_slider_' . $this->id, $initScript);
        $GLOBALS['TL_JAVASCRIPT_QUEUE']['slider_' . $this->id] = $initScript;
    }
}
