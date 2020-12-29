<?php

namespace common\components\enums;

use common\components\core\Enum;
use Yii;

class UsersRoleEnum extends Enum
{
    const ROLE_USER = 1;
    const ROLE_MANAGER = 9;
    const ROLE_ADMIN = 10;

    public static function labels()
    {
        return [
            self::ROLE_USER => Yii::t('app', "Пользователь"),
            self::ROLE_MANAGER => Yii::t('app', "Менеджер"),
            self::ROLE_ADMIN => Yii::t('app', "Администратор")
        ];
    }
}
