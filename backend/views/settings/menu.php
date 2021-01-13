<?php
/** @var $template string */

use yii\helpers\Url;

$this->title = Yii::t('app', "Настройки сайта");
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="mail-list">
    <a href="<?= Url::to(['/settings/index']) ?>" class="<?= $template == 'index' ? 'active' : '' ?>">
        <i class="mdi mdi-star-outline mr-2"></i>
        <?= Yii::t('app', "Основные") ?>
    </a>
    <a href="<?= Url::to(['/settings/links']) ?>" class="<?= $template == 'links' ? 'active' : '' ?>">
        <i class="mdi mdi-email-outline mr-2"></i>
        <?= Yii::t('app', "Социальные сети") ?>
    </a>
    <a href="<?= Url::to(['/settings/extra']) ?>"
       class="<?= $template == 'extra' ? 'active' : '' ?>">
        <i class="mdi mdi-diamond-stone mr-2"></i>
        <?= Yii::t('app', "Дополнительные") ?>
    </a>
</div>
