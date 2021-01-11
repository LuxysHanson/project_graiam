<?php

namespace common\components\enums;

use common\components\core\Enum;
use Yii;

class UsersStateEnum extends Enum
{
    const STATE_UNBLOCKED = 0;
    const STATE_BLOCKED = 1;

    public static function labels()
    {
        return [
            self::STATE_UNBLOCKED => Yii::t('app', 'Разблокирован'),
            self::STATE_BLOCKED => Yii::t('app', 'Заблокирован'),
        ];
    }
}
