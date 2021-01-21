<?php
/** @var $this View */
/** @var $content string */

use common\bundles\adminPanel\AdminAsset;
use common\components\enums\UsersRoleEnum;
use common\widgets\Alert;
use yii\helpers\Html;
use yii\web\View;

$theme = AdminAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body data-sidebar="dark">
<?php $this->beginBody() ?>

<div id="preloader">
    <div id="status">
        <div class="spinner">
            <i class="ri-loader-line spin-icon"></i>
        </div>
    </div>
</div>

<div id="layout-wrapper">

    <?php if (Yii::$app->user->can(UsersRoleEnum::ROLE_ADMIN)) : ?>
        <?= $this->render('blocks/_header') ?>
        <?= $this->render('blocks/_menu') ?>
    <?php endif; ?>

    <div class="<?= Yii::$app->user->can(UsersRoleEnum::ROLE_ADMIN) ? 'main-content' : '' ?>">

        <div class="page-content">
            <div class="container-fluid">

                <?php if (Yii::$app->user->can(UsersRoleEnum::ROLE_ADMIN) &&
                        $this->context->action->id != "error") : ?>
                    <?= $this->render("blocks/_breadcrumbs") ?>
                <?php endif; ?>

                <?= Alert::widget([
                    'options' => [
                        'class' => 'show'
                    ]
                ]) ?>

                <main>
                    <?= $content ?>
                </main>

            </div>
        </div>

    </div>

</div>

<?= $this->render('blocks/_settings', [ 'theme' => $theme ]) ?>

<div class="rightbar-overlay"></div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
