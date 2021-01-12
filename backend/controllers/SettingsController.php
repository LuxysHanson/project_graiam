<?php

namespace backend\controllers;

use common\controllers\BaseController;

class SettingsController extends BaseController
{
    public function actionIndex()
    {
        return $this->render('index');
    }
}