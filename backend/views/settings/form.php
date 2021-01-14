<?php
/** @var $model Settings */
/** @var $template string */
/** @var $_params_ string */

use backend\models\Settings;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
use yii\widgets\Pjax;

$this->title = Yii::t('app', "Настройки сайта");
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">
    <div class="col-12">

        <div class="email-leftbar card">
            <div class="mail-list">
                <a href="<?= Url::to(['/settings/index']) ?>" class="<?= $template == 'index' ? 'active' : '' ?>">
                    <i class="mdi mdi-star-outline mr-2"></i>
                    <?= Yii::t('app', "Основные") ?>
                </a>
                <a href="<?= Url::to(['/settings/links']) ?>" class="<?= $template == 'links' ? 'active' : '' ?>">
                    <i class="mdi mdi-email-outline mr-2"></i>
                    <?= Yii::t('app', "Социальные сети") ?>
                </a>
                <a href="<?= Url::to(['/settings/extra']) ?>" class="<?= $template == 'extra' ? 'active' : '' ?>">
                    <i class="mdi mdi-diamond-stone mr-2"></i>
                    <?= Yii::t('app', "Дополнительные") ?>
                </a>
            </div>
        </div>

        <div class="email-rightbar mb-3">
            <div class="card">
                <div class="card-body">

                    <?php Pjax::begin(); ?>

                    <?php $form = ActiveForm::begin([
                        'id' => "settings-form",
                        'options' => ['data[pjax]' => true]
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
