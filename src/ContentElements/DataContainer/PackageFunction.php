<?php

namespace ContentElements\DataContainer;

use Contao\Backend;

class PackageFunction extends Backend
{
    use DcaTrait;

    private $strTable;

    public function __construct()
    {
        parent::__construct();
        $this->import('BackendUser', 'User');
        $this->strTable = 'tl_package_function';
    }
}