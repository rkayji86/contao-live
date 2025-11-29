<?php

namespace ContentElements\DataContainer;

use Contao\CoreBundle\Exception\AccessDeniedException;
use Contao\DataContainer;
use Contao\Input;
use Contao\StringUtil;
use Contao\Versions;
use Contao\Image;
use Exception;

trait DcaTrait
{


    /**
     * Auto-generate an alias if it has not been set yet
     * 
     * @param mixed $varValue
     * @param DataContainer $dc
     * 
     * @return string
     * 
     * @throws Exception
     */
    public function generateAlias($varValue, DataContainer $dc)
    {
        $autoAlias = false;
        if ($varValue == '') {
            $autoAlias = true;
            $varValue = StringUtil::standardize(StringUtil::restoreBasicEntities($dc->activeRecord->title));
        }

        $objAlias = $this->Database->prepare("SELECT id FROM " . $this->strTable . " WHERE alias=?")
            ->execute($varValue);

        if ($objAlias->numRows > 1) {
            if (!$autoAlias) {
                throw new Exception(sprintf($GLOBALS['TL_LANG']['ERR']['aliasExists'], $varValue));
            }

            $varValue .= '-' . $dc->id;
        }

        return $varValue;
    }

    /**
     * Return the "toggle visibility" button
     * @param array
     * @param string
     * @param DataContainer
     * @param array
     * @param boolean
     * @param string
     * @return string
     */
    public function toggleIcon($row, $href, $label, $title, $icon, $attributes)
    {
        if (strlen(Input::get('tid'))) {
            $this->toggleVisibility(Input::get('tid'), (Input::get('state') == 1));
            $this->redirect($this->getReferer());
        }

        // Check permissions AFTER checking the tid, so hacking attempts are logged
        if (!$this->User->hasAccess($this->strTable . '::published', 'alexf')) {
            return '';
        }

        $href .= '&amp;tid=' . $row['id'] . '&amp;state=' . $row['published'];

        if (!$row['published']) {
            $icon = 'invisible.gif';
        }

        return '<a href="' . $this->addToUrl($href) . '" title="' . StringUtil::specialchars($title) . '"' . $attributes . '>' . Image::getHtml($icon, $label) . '</a> ';
    }

    /**
     * Disable/enable a item
     * @param integer
     * @param boolean
     * @param DataContainer
     */
    public function toggleVisibility($intId, $blnVisible, DataContainer $dc = null)
    {
        // Set the ID and action
        Input::setGet('id', $intId);
        Input::setGet('act', 'toggle');

        if ($dc) {
            $dc->id = $intId; // see #8043
        }

        // Check permissions to publish
        if (!$this->User->hasAccess($this->strTable . '::published', 'alexf')) {
            throw new AccessDeniedException('Not enough permissions to publish/unpublish item ID ' . $intId . '.');
        }

        $objVersions = new Versions($this->strTable, $intId);
        $objVersions->initialize();

        // Update the database
        $this->Database->prepare("UPDATE " . $this->strTable . " SET tstamp=" . time() . ", published='" . ($blnVisible ? 1 : '') . "' WHERE id=?")
            ->execute($intId);

        $objVersions->create();
    }
}
