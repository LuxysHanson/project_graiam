<?php

namespace common\components;

use common\components\custom_fields\DropDownField;
use common\components\custom_fields\JsonField;
use common\components\custom_fields\TextAreaField;
use Yii;
use yii\base\BaseObject;

/**
 * Class BaseField
 * @package common\components
 */
class BaseField extends BaseObject
{
    public $label = null;
    public $help = null;
    public $languages = false;
    public $options = [];
    public $parse = null;
    public $data = null;

    public static function instantiate($config)
    {
        $types = [
            'text' => BaseField::class,
            'text_area' => TextAreaField::class,
            'select' => DropDownField::class,
            'json' => JsonField::class
        ];

        $type = $config['type'];
        unset($config['type']);

        $config['class'] = $types[$type];
        return Yii::createObject($config);
    }
}