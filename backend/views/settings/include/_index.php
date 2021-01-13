<?php
/** @var $model Settings */
/** @var $form ActiveForm */

use backend\models\Settings;
use yii\bootstrap\ActiveForm;

?>

<h4 class="card-title mb-4"><?= Yii::t('app', "Основные настройки") ?></h4>

<?= $form->field($model, 'name')->textInput() ?>

<?= $form->field($model, 'description')->textarea() ?>

<?= $form->field($model, 'excerpt')->textarea() ?>

<?= $form->field($model, 'phone')->textInput() ?>

<?= $form->field($model, 'email')->input('email') ?>

<?= $form->field($model, 'address')->textarea() ?>
