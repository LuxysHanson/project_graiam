<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use common\bundles\adminPanel\AdminAsset;
use yii\helpers\Url;

$this->title = $name;
?>

<div class="site-error">

    <div class="my-5 pt-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center my-5">
                        <h1 class="font-weight-bold text-error">
                            4
                            <span class="error-text">
                                0 <img src="<?= AdminAsset::img($this, '/images/error-img.png') ?>" alt="error-img"
                                       class="error-img"/>
                            </span>
                            4
                        </h1>
                        <h3 class="text-uppercase"><?= Yii::t('app', "Страница не найдено") ?></h3>
                        <div class="mt-5 text-center">
                            <a class="btn btn-primary waves-effect waves-light"
                               href="<?= (!Yii::$app->user->isGuest) ? Url::to(['/site/index']) : Url::to(['/site/login']) ?>">
                                <?= Yii::t('app', "Вернуться на главную") ?>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
