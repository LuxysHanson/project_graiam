<?php

namespace common\components\core\helpers;

use Yii;

/**
 * Class ImageHelper
 * @package common\components\core\helpers
 */
class ImageHelper
{

    /**
     * Получить полный путь к загружаемому фотке
     *
     * @param string $relPath
     * @return string
     */
    public static function getFullPathUploadedImage(string $relPath)
    {
        return Yii::getAlias('@backend') . '/web' . $relPath;
    }
}