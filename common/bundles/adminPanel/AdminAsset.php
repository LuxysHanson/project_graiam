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
        'css/bootstrap.min.css',
        'css/icons.min.css',
        'css/app.min.css'
    ];
    public $js = [
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
