<?php

namespace ContentElements\Elements;

use Contao\System;
use Contao\FilesModel;
use Contao\StringUtil;
use Contao\ContentElement;
use Contao\BackendTemplate;

class IconBoxes extends ContentElement
{
    protected $strTemplate = 'ce_iconboxes';

    /**
     * Files model
     * @var FilesModel
     */
    protected $objFilesModel;

    public function generate()
    {
        if (TL_MODE == 'BE') {
            $template = new BackendTemplate('be_wildcard');
            $template->wildcard = '<span style="text-transform: none"><strong>' . $this->headline . '</strong><br>' . $this->text . '</span>';
            return $template->parse();
        }

        $GLOBALS['TL_CSS']['iconBoxes'] = 'bundles/contentelements/iconBoxes.css|static';

        $objFile = FilesModel::findByUuid($this->singleSRC);

        $this->addImage = true;
        if ($objFile === null || !is_file(System::getContainer()->getParameter('kernel.project_dir') . '/' . $objFile->path)) {
            $this->addImage = false;
        }

        $this->singleSRC = $objFile->path;
        $this->objFilesModel = $objFile;
        $this->headline2 = StringUtil::deserialize($this->headline2);
        $this->hl2 = $this->headline2['unit'];
        $this->headline2 = $this->headline2['value'];
        $this->iconboxes = StringUtil::deserialize($this->iconboxes);

        return parent::generate();
    }

    protected function compile()
    {
        $figure = System::getContainer()
            ->get('contao.image.studio')
            ->createFigureBuilder()
            ->from($this->objFilesModel)
            ->setMetadata($this->objModel->getOverwriteMetadata())
            ->enableLightbox((bool) $this->fullsize);

        $figure->setSize('_icon_boxes_image');

        $figure = $figure->buildIfResourceExists();

        if (null !== $figure) {
            $figure->applyLegacyTemplateData($this->Template);
        }
    }
}
