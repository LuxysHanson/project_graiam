<?php

namespace common\controllers;

use common\components\enums\UsersRoleEnum;
use yii\base\Controller as Controller;
use yii\filters\AccessControl;

/**
 * Class BaseController
 * @package common\controllers
 */
class BaseController extends Controller
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
