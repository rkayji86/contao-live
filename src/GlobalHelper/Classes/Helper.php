<?php

namespace GlobalHelper\Classes;

use Contao\Image\ResizeConfiguration;
use Contao;
use Contao\StringUtil;

class Helper
{
    public static function cropImage($img, $width, $height, $mode = 'crop')
    {
        if ($img && strlen($img) > 1) {
            $container = Contao\System::getContainer();
            $rootDir = $container->getParameter('kernel.project_dir');
            if (substr($img, 0, 1) == '/') {
                $path = $img;
            } else {
                $file = Contao\FilesModel::findById(StringUtil::deserialize($img));
                $path = '/' . $file->path;
            }
            if ($path != '/' && file_exists(TL_ROOT . $path) && filesize(TL_ROOT . $path) > 0) {
                $path = $container->get('contao.image.image_factory')->create($rootDir . '/' . $path, (new ResizeConfiguration())->setWidth($width)->setHeight($height)->setMode($mode))->getUrl($rootDir);
                return $path;
            }
        }
    }
}