<?php
use yii\widgets\Breadcrumbs; ?>

<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0"><?= $this->title ?></h4>
            <div class="page-title-right">
                <?= Breadcrumbs::widget([
                    'options' => [ 'class' => 'breadcrumb m-0'],
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                    'itemTemplate' => "<li class=\"breadcrumb-item\">{link}</li>",
                    'activeItemTemplate' => "<li class=\"breadcrumb-item active\">{link}</li>"
                ]) ?>
            </div>
        </div>
    </div>
</div>
