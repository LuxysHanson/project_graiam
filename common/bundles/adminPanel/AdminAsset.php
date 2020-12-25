<?php

namespace common\bundles\adminPanel;

use yii\base\InvalidConfigException;
use yii\web\AssetBundle;

/**
 * Admin panel theme application asset bundle.
 */
class AdminAsset extends AssetBundle
{
    public $sourcePath = '@common/bundles/adminPanel/assets';
    public $css = [
//        'libs/metismenu/metis-menu.min.css',
//        'libs/node-waves/waves.min.css',
        'styles/bootstrap.min.css',
        'styles/icons.min.css',
        'styles/app.min.css'
    ];
    public $js = [
        'scripts/bootstrap.bundle.min.js',
        'libs/metismenu/metis-menu.min.js',
        'libs/node-waves/waves.min.js',
        'libs/admin-resources/jquery-jvectormap.min.js',
        'scripts/app.min.js',
    ];
    public $depends = [
    ];

    /**
     * @param $view // вьюшка
     * @param $path // путь к файлу
     * @return string
     *
     * @throws InvalidConfigException
     */
    public static function img($view, $path)
    {
        $theme = AdminAsset::register($view);
        return $theme->baseUrl . $path;
    }
}
