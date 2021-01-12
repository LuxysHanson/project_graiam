<?php
/** @var $model Settings */

use backend\models\Settings;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;

$this->title = Yii::t('app', "Настройки сайта");
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">
    <div class="col-12">

        <div class="email-leftbar card">
            <div class="mail-list">
                <a href="<?= Url::to(['/settings/index']) ?>" class="active">
                    <i class="mdi mdi-star-outline mr-2"></i>
                    <?= Yii::t('app', "Основные") ?>
                </a>
                <a href="<?= Url::to(['/settings/links']) ?>">
                    <i class="mdi mdi-email-outline mr-2"></i>
                    <?= Yii::t('app', "Социальные сети") ?>
                </a>
                <a href="<?= Url::to(['/settings/additional']) ?>">
                    <i class="mdi mdi-diamond-stone mr-2"></i>
                    <?= Yii::t('app', "Дополнительные") ?>
                </a>
            </div>
        </div>

        <div class="email-rightbar mb-3">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title mb-4"><?= Yii::t('app', "Основные настройки") ?></h4>

                    <?php $form = ActiveForm::begin(['id' => 'login-form', 'class' => 'form-horizontal']); ?>

<!--                    --><?//= $form->field($model, 'name')->textInput() ?>

<!--                    --><?//= $form->field($model, 'description')->textInput() ?>

                    <div class="form-group row">
                        <label for="example-text-input" class="col-md-2 col-form-label">Text</label>
                        <div class="col-md-10">
                            <input class="form-control" type="text" value="Artisanal kale" id="example-text-input">
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-12 d-flex justify-content-end">
                            <button type="submit" class="btn btn-success w-lg waves-effect waves-light">
                                <?= Yii::t('app', "Сохранить") ?>
                            </button>
                        </div>
                    </div>

                    <?php ActiveForm::end() ?>
                </div>
            </div>
        </div>

    </div>
</div>