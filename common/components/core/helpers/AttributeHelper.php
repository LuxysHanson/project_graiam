<?php

namespace common\components\core\helpers;

/**
 * Class AttributeHelper
 * @package common\components\core\helpers
 */
class AttributeHelper
{
    /**
     * Загрузка данных
     *
     * @param mixed $from
     * @param array $to
     */
    public static function loadAttributes($from,array $to): void
    {
        if (!empty($to)) {
            foreach ($to as $key => $item) {
                if ($from->hasAttribute($key)) {
                    $from->{$key} = $item;
                }
            }
        }
    }
}