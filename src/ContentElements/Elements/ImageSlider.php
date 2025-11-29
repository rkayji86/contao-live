<?php

namespace ContentElements\Elements;

use Contao\ContentElement;
use Contao\File;
use Contao\FilesModel;
use Contao\StringUtil;
use Contao\System;

class ImageSlider extends ContentElement
{
    public const TYPE = 'imageslider';
    public const PALETTE = '{type_legend},type,headline;{source_legend},multiSRC;{settings_legend},distancetop,bluebg;{invisible_legend:hide},invisible,start,stop';
    /**
     * Template
     * @var string
     */
    protected $strTemplate = 'ce_' . self::TYPE;

    public function generate()
    {
        $this->multiSRC = StringUtil::deserialize($this->multiSRC);
        $this->orderSRC = StringUtil::deserialize($this->orderSRC);

        // Return if there are no files
        if (empty($this->multiSRC) || !\is_array($this->multiSRC)) {
            return '';
        }

        // Get the file entries from the database
        $this->objFiles = FilesModel::findMultipleByUuids($this->orderSRC ?: $this->multiSRC);

        if ($this->objFiles === null) {
            return '';
        }

        $GLOBALS['TL_JAVASCRIPT']['splide'] = 'bundles/contentelements/splide.min.js|static';
        $GLOBALS['TL_CSS']['splide'] = 'bundles/contentelements/splide.min.css|static';
        $GLOBALS['TL_CSS'][self::TYPE] = 'bundles/contentelements/' . self::TYPE . '.css|static';

        return parent::generate();
    }

    /**
     * Compile the current element
     */
    protected function compile()
    {
        // Always use the default template in the back end
        $images = array();
        $projectDir = System::getContainer()->getParameter('kernel.project_dir');
        $initScript = \file_get_contents($projectDir . '/public/bundles/contentelements/init-image-slider.js');
        $initScript = str_replace('__id__', 'image_slider_' . $this->id, $initScript);
        $GLOBALS['TL_JAVASCRIPT_QUEUE']['slider_' . $this->id] = $initScript;

        $objFiles = $this->objFiles;
        // Get all images
        while ($objFiles->next()) {
            // Continue if the files has been processed or does not exist
            if (isset($images[$objFiles->path]) || !file_exists($projectDir . '/' . $objFiles->path)) {
                continue;
            }

            // Single files
            if ($objFiles->type == 'file') {
                $objFile = new File($objFiles->path);

                if (!$objFile->isImage) {
                    continue;
                }

                $row = $objFiles->row();
                $row['mtime'] = $objFile->mtime;

                // Add the image
                $images[$objFiles->path] = $row;
            }

            // Folders
            else {
                $objSubfiles = FilesModel::findByPid($objFiles->uuid, array('order' => 'name'));

                if ($objSubfiles === null) {
                    continue;
                }

                while ($objSubfiles->next()) {
                    // Skip subfolders
                    if ($objSubfiles->type == 'folder') {
                        continue;
                    }

                    $objFile = new File($objSubfiles->path);

                    if (!$objFile->isImage) {
                        continue;
                    }

                    $row = $objSubfiles->row();
                    $row['mtime'] = $objFile->mtime;

                    // Add the image
                    $images[$objSubfiles->path] = $row;
                }
            }
        }

        $images = array_values($images);

        $this->Template->images = $images;
    }
}
