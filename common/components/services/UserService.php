<?php

namespace common\components\services;

use common\components\core\Service;
use common\models\forms\LoginForm;
use common\models\Users;
use Yii;

class UserService extends Service
{
    /**
     * Авторизация пользователя
     *
     * @param LoginForm $form
     * @return bool
     */
    public function login(LoginForm $form)
    {
        if ($form->validate()) {
            return Yii::$app->user->login($form->getUser(), $form->rememberMe ? 3600 * 24 * 30 : 0);
        }

        return false;
    }

    public function changeState(int $state)
    {
        $currentUser = Yii::$app->user->identity;
        $currentUser->is_blocked = $state;
        $currentUser->save();
    }
}