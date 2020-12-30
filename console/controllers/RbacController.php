<?php

namespace console\controllers;

use common\components\enums\UsersRoleEnum;
use Yii;
use yii\console\Controller;

/**
 * Class RbacController
 * @package console\controllers
 */
class RbacController extends Controller
{
    public function actionInit()
    {
        $authManager = Yii::$app->authManager;
        $authManager->removeAll();

        $guest  = $authManager->createRole(UsersRoleEnum::ROLE_USER);
        $admin = $authManager->createRole(UsersRoleEnum::ROLE_ADMIN);
        $manager = $authManager->createRole(UsersRoleEnum::ROLE_MANAGER);

        $authManager->add($guest);
        $authManager->add($admin);
        $authManager->add($manager);

        $authManager->addChild($manager, $guest);
    }
}