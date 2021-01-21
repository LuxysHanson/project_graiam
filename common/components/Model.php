<?php

namespace common\components;

use yii\base\Model as BaseModel;

/**
 * Class Model
 * @package common\components
 */
class Model extends BaseModel
{
    public function hasAttribute($name)
    {
        return isset($this->_attributes[$name]) || in_array($name, $this->attributes(), true);
    }
}