<?php

namespace common\components;

/**
 * Class ActiveRecord
 * @package common\components
 */
class ActiveRecord extends \yii\db\ActiveRecord
{

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