<?php

namespace common\components\core\traits;

/**
 * Trait AttributesToInfoTrait
 * @package common\components\core\traits
 */
trait AttributesToInfoTrait
{

    public function attributesToInfo()
    {
        return [];
    }

    private $_properties = -1;

    public function __get($name)
    {

        if (in_array($name, $this->attributesToInfo())) {
            $info = $this->infoJson;
            return isset($info[$name]) ? $info[$name] : null;
        }
        return parent::__get($name);
    }

    public function __set($name, $value)
    {
        if (in_array($name, $this->attributesToInfo())) {
            $this->setInfo($name, $value);
        } else {
            parent::__set($name, $value);
        }
    }

    public function attributes()
    {
        return array_merge(parent::attributes(), $this->attributesToInfo());
    }

}