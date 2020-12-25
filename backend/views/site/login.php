<?php
/* @var $this View */
/* @var $form ActiveForm */

/* @var $model LoginForm */

use common\models\LoginForm;
use yii\bootstrap\ActiveForm;
use yii\web\View;

$this->title = Yii::t('app', "Логин");
?>

    <div class="col-lg-9">
        <div>
            <div class="text-center">
                <div>
                    <a href="/" class="logo">
                        <!--                                                    <img src="-->
                        <? //= AdminAsset::img($this, '/images/logo-dark.png') ?><!--" height="20" alt="logo">-->
                    </a>
                </div>
            </div>

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
                        'placeholder' => "Enter username"
                    ]) ?>

                    <?php
                    $fieldOptions = array_merge($fieldOptions, [
                        'inputTemplate' => "<i class='ri-lock-2-line auti-custom-input-icon'></i>{input}"
                    ])
                    ?>
                    <?= $form->field($model, 'password', $fieldOptions)->passwordInput([
                        'placeholder' => "Enter password"
                    ]) ?>

                    <?php
                    $fieldChecbox = [
                        'options' => ['class' => 'custom-control custom-checkbox'],
                        'inputTemplate' => "{input}<label class='custom-control-label' for='loginform-rememberme'>Запомнить меня</label>"
                    ]
                    ?>
                    <?= $form->field($model, 'rememberMe', $fieldChecbox)->checkbox([
                        'class' => 'custom-control-input'
                    ])->label(false) ?>

                    <div class="mt-4 text-center">
                        <button class="btn btn-primary w-md waves-effect waves-light"
                                type="submit"><?= Yii::t('app', "Войти") ?></button>
                    </div>

                    <div class="mt-4 text-center">
                        <a href="#" class="text-muted">
                            <i class="mdi mdi-lock mr-1"></i>
                            <?= Yii::t('app', "Забыли пароль?") ?>
                        </a>
                    </div>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>


<?php /*

<div class="site-login">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Please fill out the following fields to login:</p>

    <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

    <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

    <?= $form->field($model, 'password')->passwordInput() ?>

    <?= $form->field($model, 'rememberMe')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton('Login', ['class' => 'btn btn-primary btn-block', 'name' => 'login-button']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
 */ ?>