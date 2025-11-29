<?php

namespace ContentElements\Elements;

use Contao\ContentElement;
use Contao\FilesModel;
use Contao\StringUtil;
use Contao\System;

class ListAndImage extends ContentElement
{
    /**
     * Element type
     * @var string
     */
    public const TYPE = 'listAndImage';

    /**
     * Palette
     * @var string
     */
    public const PALETTE = '{type_legend},type,headline;{text_legend},text;{source_legend},customSingleSRC,overwriteMeta;{list_legend},listItemWizard;{button_legend},add_button;{settings_legend},distancetop,bluebg;{expert_legend:hide},guests,cssID;{invisible_legend:hide},invisible,start,stop';

    /**
     * Template
     * @var string
     */
    protected $strTemplate = 'ce_' . self::TYPE;
    /**
     * Files model
     * @var FilesModel
     */
    protected $objFilesModel;

    /**
     * Return if the image does not exist
     *
     * @return string
     */
    public function generate()
    {
        if (!$this->customSingleSRC && $this->singleSRC) {
            $this->objModel->customSingleSRC = $this->singleSRC;
            $this->objModel->save();
            $this->customSingleSRC = $this->singleSRC;
        }
        $this->singleSRC = $this->customSingleSRC;

        if ($this->singleSRC) {
            $objFile = FilesModel::findByUuid($this->singleSRC);

            $this->singleSRC = $objFile->path ?? null;
            $this->objFilesModel = $objFile;
        }
        $this->listItemWizard = StringUtil::deserialize($this->listItemWizard, true);

        $GLOBALS['TL_CSS'][self::TYPE] = 'bundles/contentelements/' . self::TYPE . '.css|static';

        return parent::generate();
    }

    /**
     * Generate the content element
     */
    protected function compile()
    {
        $figure = System::getContainer()
            ->get('contao.image.studio')
            ->createFigureBuilder()
            ->from($this->objFilesModel)
            ->setMetadata($this->objModel->getOverwriteMetadata())
            ->enableLightbox((bool) $this->fullsize);

        $figure->setSize('_image_text_full');

        $figure = $figure->buildIfResourceExists();

        if (null !== $figure) {
            $figure->applyLegacyTemplateData($this->Template);
        }
    }
}
