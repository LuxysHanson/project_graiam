<?php
/** @var $model UsersProfile */
/** @var $form ActiveForm */

use backend\models\UsersProfile;
use kartik\file\FileInput;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Modal;
use yii\helpers\Url;

?>

<h4 class="card-title mb-4"><?= Yii::t('app', "Основные данные") ?></h4>

<!--<div class="custom-file">-->
<!--    <input type="file" class="custom-file-input" id="customFile">-->
<!--    <label class="custom-file-label" for="customFile">Choose file</label>-->
<!--</div>-->

<?//= $form->field($model, 'image')->fileInput(['accept' => 'image/*']) ?>

<label class="control-label" for="settings-excerpt">
    <?= Yii::t('app', "Логотип администратора") ?>
</label>

<?= $form->field($model, 'image[]')->widget(FileInput::class, [
    'name' => 'image',
    'bsVersion' => 4,
    'options' => [
        'accept' => 'image/*'
    ],
    'pluginOptions' => [
        'showCaption' => false,
//        'uploadUrl' => Url::to(['/site/file-upload']),
//        'showRemove' => false,
        'showUpload' => false
    ]
]) ?>

<i><?= Yii::t('app', "Рекомендуемый формат: JPEG(JPG)/PNG Рекомендуемый размер: 300x300") ?></i>
