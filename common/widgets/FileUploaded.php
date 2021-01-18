<?php

namespace common\widgets;

use kartik\file\FileInput;
use kartik\file\FileInputAsset;
use Yii;
use yii\web\JqueryAsset;
use yii\web\View;

/**
 * Class FileUploaded
 * @package common\widgets
 */
class FileUploaded extends FileInput
{
    public function init()
    {
        parent::init();
        FileInputAsset::register($this->view);
        if (!empty($this->assets_path)) {

            $bundle = Yii::$app->assetManager->publish($this->assets_path);

            if (!empty($this->js)) {
                foreach ($this->js as $js) {
                    $path = $bundle[1] . "/" . $js;
                    if (strpos($js, 'http') === 0) {
                        $path = $js;
                    }
                    $this->view->registerJsFile($path, [
                        View::POS_END,
                        'depends' => [JqueryAsset::class]
                    ]);
                }
            }

            if (!empty($this->css)) {
                foreach ($this->css as $css) {
                    $this->view->registerCssFile($bundle[1]."/".$css);
                }
            }
        }
    }
}