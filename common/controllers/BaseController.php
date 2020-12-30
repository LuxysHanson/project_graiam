<?php

namespace common\controllers;

use yii\filters\VerbFilter;
use yii\web\Controller;

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
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }
}
