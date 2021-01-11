<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use common\bundles\adminPanel\AdminAsset;
use common\components\enums\UsersRoleEnum;
use yii\helpers\Url;

$this->title = $name;
$exceptionCode = (string) $exception->statusCode;
?>

<div class="site-error">

    <div class="my-5 pt-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center my-5">
                        <h1 class="font-weight-bold text-error">
                            <?= $exceptionCode{0} ?>
                            <span class="error-text">
                                0 <img src="<?= AdminAsset::img($this, '/images/error-img.png') ?>" alt="error-img"
                                       class="error-img"/>
                            </span>
                            <?= $exceptionCode{2} ?>
                        </h1>
                        <h3 class="text-uppercase"><?= trim($message, ".") ?></h3>
                        <div class="mt-5 text-center">
                            <?php if (Yii::$app->user->can(UsersRoleEnum::ROLE_ADMIN)) : ?>
                                <a class="btn btn-primary waves-effect waves-light" href="<?= Url::to(['/site/index']) ?>">
                                    <?= Yii::t('app', "Вернуться на главную") ?>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
