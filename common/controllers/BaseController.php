<?php

namespace common\controllers;

use common\components\enums\UsersRoleEnum;
use yii\filters\AccessControl;
use yii\web\Controller as ControllerAlias;

/**
 * Class BaseController
 * @package common\controllers
 */
class BaseController extends ControllerAlias
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => [UsersRoleEnum::ROLE_ADMIN],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['login', 'error'],
                        'roles' => ['@']
                    ],
                    [
                        'allow' => true,
                        'actions' => ['login', 'error'],
                        'roles' => ['?']
                    ]
                ],
            ]
        ];
    }
}
