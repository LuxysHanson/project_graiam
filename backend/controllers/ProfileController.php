<?php

namespace backend\controllers;

use backend\models\forms\ProfileForm;
use backend\models\UsersProfile;
use backend\services\UsersProfileService;
use common\controllers\BaseController;
use Yii;
use yii\web\UploadedFile;

/**
 * Class ProfileController
 * @package backend\controllers
 */
class ProfileController extends BaseController
{
    /** @var UsersProfileService */
    private $profileService;

    public function __construct($id, $module, UsersProfileService $profileService, $config = [])
    {
        $this->profileService = $profileService;
        parent::__construct($id, $module, $config);
    }

    public function actionIndex()
    {
        return $this->renderForm('index');
    }

    public function actionSecurity()
    {
        return $this->renderForm('security');
    }

    public function actionNotifications()
    {
        return $this->renderForm('notifications');
    }

    public function renderForm(string $template)
    {
        $model = new ProfileForm();
        $condition = [
            'user_id' => Yii::$app->user->identity->id
        ];
        if ($profile = $this->profileService->getOneByCondition($condition)) {
            $model = $profile;
        }

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect([$template]);
        }

        return $this->render("form", [
            'model' => $model,
            'template' => $template
        ]);
    }
}