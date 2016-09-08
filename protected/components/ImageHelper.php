<?php

/**
 * Image helper functions
 *
 */
class ImageHelper
{
    /**
     * Directory to store thumbnails
     *
     * @var string
     */
    const THUMB_DIR = '.tmb';

    /**
     * Create a thumbnail of an image and returns relative path in webroot
     * the options array is an associative array which can take the values
     * quality (jpg quality) and method (the method for resizing)
     *
     * @param int    $width
     * @param int    $height
     * @param string $img
     * @param array  $options
     *
     * @return string $path
     */
    public static function thumb($width, $height, $img, $options = null)
    {
        if (!file_exists($img)) {
            $img = str_replace('\\', '/', YiiBase::getPathOfAlias('webroot') . $img);
            if (!file_exists($img)) {
                $img = '/images/shop_item_01';
            }
        }

        // Jpeg quality
        $quality = 80;
        // Method for resizing
        $method = 'adaptiveResize';
        if ($options) {
            extract($options, EXTR_IF_EXISTS);
        }

        $pathInfo = pathinfo($img);
        $thumbName = "thumb_" . $pathInfo['filename'] . '_' . $method . '_' . $width . '_' . $height . '.'
            . CHtml::value($pathInfo, 'extension');
        $thumbPath = $pathInfo['dirname'] . '/' . self::THUMB_DIR . '/';
        if (!file_exists($thumbPath)) {
            mkdir($thumbPath);
        }

        if (!file_exists($thumbPath . $thumbName) || filemtime($thumbPath . $thumbName) < filemtime($img)) {
            Yii::import('ext.phpThumb.PhpThumbFactory');
            $options = array('jpegQuality' => $quality);
            $thumb = PhpThumbFactory::create($img, $options);
            $thumb->{$method}($width, $height);
            $thumb->save($thumbPath . $thumbName);
        }

        return str_replace(YiiBase::getPathOfAlias('webroot'), '', $thumbPath . $thumbName);
    }


    public static function saveFile($uploadDir, $image)
    {
        $ext = strtolower(substr(strrchr($image['name'], '.'), 1));
        $newFilename = md5(basename($image['name']) . mktime()) . '.' . $ext;
        $uploadFile = $uploadDir . '/' . $newFilename;
        move_uploaded_file($image['tmp_name'], $uploadFile);

        return $uploadFile;
    }
}
