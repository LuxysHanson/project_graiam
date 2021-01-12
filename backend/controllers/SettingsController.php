<?php

namespace backend\controllers;

use common\controllers\Controller;

class SettingsController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }
}