<?php
/**
 * @var $this View
 * @var $form ActiveForm
 * @var $model LoginForm
 */

use common\models\forms\LoginForm;
use yii\bootstrap\ActiveForm;
use yii\web\View;

$this->title = Yii::t('app', "Логин");
?>

<div class="p-2 mt-5">
    <?php $form = ActiveForm::begin(['id' => 'login-form', 'class' => 'form-horizontal']); ?>

    <?php
    $fieldOptions = [
        'options' => ['class' => 'form-group auth-form-group-custom mb-4'],
        'inputTemplate' => "<i class='ri-user-2-line auti-custom-input-icon'></i>{input}"
    ];
    ?>
    <?= $form->field($model, 'username', $fieldOptions)->textInput([
        'autofocus' => true,
        'placeholder' => Yii::t('app', "Введите логин")
    ]) ?>

    <?php
    $fieldOptions = array_merge($fieldOptions, [
        'inputTemplate' => "<i class='ri-lock-2-line auti-custom-input-icon'></i>{input}"
    ])
    ?>
    <?= $form->field($model, 'password', $fieldOptions)->passwordInput([
        'placeholder' => Yii::t('app', "Введите пароль")
    ]) ?>

    <?php
    $fieldChecbox = [
        'options' => ['class' => 'custom-control custom-checkbox'],
        'inputTemplate' => "{input}<label class='custom-control-label' for='loginform-rememberme'>".
            Yii::t('app', "Запомнить меня")."</label>"
    ]
    ?>
    <?= $form->field($model, 'rememberMe', $fieldChecbox)->checkbox([
        'class' => 'custom-control-input'
    ])->label(false) ?>

    <div class="mt-4 text-center">
        <button class="btn btn-primary w-md waves-effect waves-light"
                type="submit"><?= Yii::t('app', "Войти") ?></button>
    </div>

    <?php ActiveForm::end(); ?>
</div>