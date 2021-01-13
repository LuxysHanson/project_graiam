<?php

namespace backend\controllers;

use backend\models\Settings;
use backend\services\SettingsService;
use common\controllers\Controller;
use Yii;

/**
 * Class SettingsController
 * @package backend\controllers
 */
class SettingsController extends Controller
{
    /** @var SettingsService */
    private $settingsService;

    public function __construct($id, $module, SettingsService $settingsService, $config = [])
    {
        $this->settingsService = $settingsService;
        parent::__construct($id, $module, $config);
    }

    public function actionIndex()
    {
        return $this->renderForm('index');
    }

    public function actionLinks()
    {
        return $this->renderForm('links');
    }

    public function actionExtra()
    {
        return $this->renderForm('extra');
    }

    public function renderForm(string $template)
    {
        $model = new Settings();
        if ($settings = $this->settingsService->findSettingsByAdmin()) {
            $model = $settings;
        }

        if ($model->load(Yii::$app->request->post())) {
            $model->template = $template;
            if ($model->save()) {
                return $this->redirect([$template]);
            }
        }

        return $this->render("@backend/views/common/form", [
            'model' => $model,
            'template' => $template
        ]);
    }
}