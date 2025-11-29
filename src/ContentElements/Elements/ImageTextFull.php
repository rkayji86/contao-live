<?php

namespace ContentElements\Elements;

use Contao\ContentElement;
use Contao\FilesModel;
use Contao\System;

class ImageTextFull extends ContentElement
{
    /**
     * Element type
     * @var string
     */
    public const TYPE = 'imagetext_full';

    /**
     * Palette
     * @var string
     */
    public const PALETTE = '{type_legend},type,headline;{source_legend},singleSRC,overwriteMeta;{text_legend},text;{link_legend},link_1_url,link_1_title,link_1_target,link_2_url,link_2_title,link_2_target;{template_legend:hide},customTpl;{expert_legend:hide},guests,cssID;{invisible_legend:hide},invisible,start,stop';

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
        if (!$this->singleSRC) {
            return '';
        }
        $objFile = FilesModel::findByUuid($this->singleSRC);

        if ($objFile === null || !is_file(System::getContainer()->getParameter('kernel.project_dir') . '/' . $objFile->path)) {
            return '';
        }

        $this->singleSRC = $objFile->path;
        $this->objFilesModel = $objFile;

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