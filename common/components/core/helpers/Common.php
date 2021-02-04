<?php

namespace common\components\core\helpers;

use Yii;

/**
 * Class Common
 * @package common\components\core\helpers
 */
class Common
{
    /**
     * Получить данные по текущему языку
     *
     * @param $value
     * @param null $language
     * @return array|mixed
     */
    public static function byLang($value, $language = null)
    {
        $language = $language ?: Yii::$app->language;
        $data = !is_array($value) ? json_decode($value, true) : $value;
        if (is_array($data)) {
            if (!empty($data[$language])) {
                return $data[$language];
            } else {
                foreach ($data as $d) {
                    if (!empty($d)) {
                        return $d;
                    }
                }
                return $d;
            }
        }
        return $value;
    }
}