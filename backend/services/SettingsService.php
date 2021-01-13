<?php

namespace backend\services;

use common\components\core\Service;
use common\components\enums\UsersRoleEnum;

class SettingsService extends Service
{
    /**
     * @return mixed|null
     */
    public function findSettingsByAdmin()
    {
        $query = self::find()->with('user');
        $settings = self::getOneByCondition([], $query);
        if ($settings) {
            if ($settings->user && $settings->user->role == UsersRoleEnum::ROLE_ADMIN) {
                return $settings;
            }
        }
        return null;
    }
}