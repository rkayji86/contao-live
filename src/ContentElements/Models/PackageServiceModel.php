<?php

namespace Contao;

class PackageServiceModel extends Model
{

    /**
     * Table name
     * @var string
     */
    protected static $strTable = 'tl_package_service';

    public static function findPublishedById($id)
    {

        $t = static::$strTable;

        return static::findOneBy(["$t.published=? AND $t.id=?"], [1, $id]);
    }

    public static function findPublished()
    {

        $t = static::$strTable;

        return static::findBy(["$t.published=?"], [1], ['order' => "$t.sorting"]);
    }
}
