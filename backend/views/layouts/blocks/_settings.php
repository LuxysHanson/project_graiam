<?php
/** @var $theme AdminAsset */
use common\bundles\adminPanel\AdminAsset; ?>

<div class="right-bar">
    <div data-simplebar class="h-100">
        <div class="rightbar-title px-3 py-4">
            <a href="javascript:void(0);" class="right-bar-toggle float-right">
                <i class="mdi mdi-close noti-icon"></i>
            </a>
            <h5 class="m-0"><?= Yii::t('app', "Настройки") ?></h5>
        </div>

        <hr class="mt-0"/>
        <h6 class="text-center mb-0"><?= Yii::t('app', "Выберите макеты") ?></h6>

        <div class="p-4">
            <div class="mb-2">
                <img class="img-fluid img-thumbnail" alt="layout-1"
                     src="<?= AdminAsset::img($this, '/images/layouts/layout-1.jpg') ?>" />
            </div>
            <div class="custom-control custom-switch mb-3">
                <input type="checkbox" class="custom-control-input theme-choice" id="light-mode-switch" checked/>
                <label class="custom-control-label" for="light-mode-switch">
                    <?= Yii::t('app', "Светлая тема") ?>
                </label>
            </div>

            <div class="mb-2">
                <img class="img-fluid img-thumbnail" alt="layout-2"
                     src="<?= AdminAsset::img($this, '/images/layouts/layout-2.jpg') ?>">
            </div>
            <div class="custom-control custom-switch mb-3">
                <input type="checkbox" class="custom-control-input theme-choice" id="dark-mode-switch"
                       data-bsStyle="<?= AdminAsset::img($this, '/styles/bootstrap-dark.min.css') ?>"
                       data-appStyle="<?= AdminAsset::img($this, '/styles/bootstrap-dark.min.css') ?>"/>
                <label class="custom-control-label" for="dark-mode-switch">
                    <?= Yii::t('app', "Темная тема") ?>
                </label>
            </div>

            <input type="hidden" class="admin-theme-url" value="<?= $theme->baseUrl ?>" />
        </div>

    </div>
</div>