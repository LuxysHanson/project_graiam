<?php

namespace common\components;

use common\components\enums\UsersRoleEnum;
use Yii;
use yii\rbac\Assignment;
use yii\rbac\PhpManager as rbacManager;

/**
 * Class PhpManager
 * @package common\components
 */
class PhpManager extends rbacManager
{
    public function init()
    {
        parent::init();
    }

    public function getAssignments($userId)
    {
        if(!Yii::$app->user->isGuest){
            $assignment = new Assignment;
            $assignment->userId = $userId;
            $assignment->roleName = Yii::$app->user->identity->role ?: UsersRoleEnum::ROLE_USER;

            return [$assignment->roleName => $assignment];
        }
        return [];
    }
}