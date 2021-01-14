<?php
/** @var $model ProfileForm */
/** @var $template string */
/** @var $_params_ string */

use backend\models\forms\ProfileForm;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use yii\widgets\Pjax;

$this->title = Yii::t('app', "Профиль");
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">
    <div class="col-12">

        <div class="email-leftbar card">
            <div class="mail-list">
                <a href="<?= Url::to(['/profile/index']) ?>" class="<?= $template == 'index' ? 'active' : '' ?>">
                    <i class="mdi mdi-star-outline mr-2"></i>
                    <?= Yii::t('app', "Основные данные") ?>
                </a>
                <a href="<?= Url::to(['/profile/security']) ?>" class="<?= $template == 'security' ? 'active' : '' ?>">
                    <i class="mdi mdi-security mr-2"></i>
                    <?= Yii::t('app', "Безопасность") ?>
                </a>
                <a href="<?= Url::to(['/profile/notifications']) ?>" class="<?= $template == 'notifications' ? 'active' : '' ?>">
                    <i class="mdi mdi-bell-outline mr-2"></i>
                    <?= Yii::t('app', "Уведомления") ?>
                </a>
            </div>
        </div>

        <div class="email-rightbar mb-3">
            <div class="card">
                <div class="card-body">

                    <?php Pjax::begin(); ?>

                    <?php $form = ActiveForm::begin([
                        'id' => "profile-form",
                        'options' => [
                            ['data[pjax]' => true],
                            ['enctype' => 'multipart/form-data']
                        ]
                    ]); ?>

                    <?= $this->render("include/_".$template, array_merge($_params_, [
                        'form' => $form
                    ])) ?>

                    <div class="row mt-4">
                        <div class="col-12 d-flex justify-content-end">
                            <button type="submit" class="btn btn-success w-lg waves-effect waves-light">
                                <?= Yii::t('app', "Сохранить") ?>
                            </button>
                        </div>
                    </div>

                    <?php ActiveForm::end() ?>

                    <?php Pjax::end() ?>

                </div>
            </div>
        </div>

    </div>
</div>