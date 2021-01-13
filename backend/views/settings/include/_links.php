<?php
/** @var $model Settings */
/** @var $form ActiveForm */

use backend\models\Settings;
use yii\bootstrap\ActiveForm;

?>

<h4 class="card-title mb-4"><?= Yii::t('app', "Социальные сети") ?></h4>

<?= $form->field($model, 'facebook_link')->textInput()->label(Yii::t('app', "Ссылка для Facebook")) ?>

<?= $form->field($model, 'insta_link')->textInput()->label(Yii::t('app', "Ссылка для Instagram")) ?>

<?= $form->field($model, 'twitter_link')->textInput()->label(Yii::t('app', "Ссылка для Twitter")) ?>

<?= $form->field($model, 'google_link')->textInput()->label(Yii::t('app', "Ссылка для Google")) ?>
