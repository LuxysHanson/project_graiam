<?php
/* @var $model LoginForm */

use common\models\forms\LoginForm;
use yii\bootstrap\ActiveForm;

$this->title = Yii::t('app', "Блокировка экрана");
?>

<div class="p-2 mt-5">
    <?php $form = ActiveForm::begin(['id' => 'login-form', 'class' => 'form-horizontal']); ?>

        <div class="user-thumb text-center mb-5">
<!--            <img src="assets/images/users/avatar-2.jpg" class="rounded-circle img-thumbnail avatar-md" alt="thumbnail">-->
            <h5 class="font-size-15 mt-3">
                <?= Yii::$app->user->identity->username ?>
            </h5>
        </div>

        <?php
        $fieldOptions = [
            'options' => ['class' => 'form-group auth-form-group-custom mb-4'],
            'inputTemplate' => "<i class='ri-lock-2-line auti-custom-input-icon'></i>{input}"
        ]
        ?>
        <?= $form->field($model, 'password', $fieldOptions)->passwordInput([
            'placeholder' => Yii::t('app', "Введите пароль")
        ]) ?>

        <div class="mt-4 text-center">
            <button class="btn btn-primary w-md waves-effect waves-light" type="submit">
                <?= Yii::t('app', "Разблокировать") ?>
            </button>
        </div>
    <?php ActiveForm::end(); ?>
</div>