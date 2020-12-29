<?php

namespace common\components\enums;

use common\components\core\Enum;
use Yii;

class UsersEnum extends Enum
{
    const STATUS_INACTIVE = 9;
    const STATUS_ACTIVE = 10;

    public static function labels()
    {
        return [
            self::STATUS_ACTIVE => Yii::t('app', 'Активен'),
            self::STATUS_INACTIVE => Yii::t('app', 'Неактивен'),
        ];
    }
}
