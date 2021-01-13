<?php

namespace common\components;

/**
 * Class ActiveRecord
 * @package common\components
 */
class ActiveRecord extends \yii\db\ActiveRecord
{

    public function __get($name)
    {
        if (substr($name, strlen($name) - 4, 4) == 'Json') {
            $name = substr($name, 0, strlen($name) - 4);
            $attr = parent::__get($name);
            return is_array($attr) ? $attr : (json_decode($attr, true) ? json_decode($attr, true) : []);
        }
        return parent::__get($name);
    }

    public function setInfo($name, $value)
    {
        $jInfo = $this->infoJson;
        if (!$jInfo) {
            $jInfo = array();
        }
        $jInfo[$name] = $value;
        $this->info = $jInfo;
    }

}