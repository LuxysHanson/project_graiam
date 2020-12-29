<?php

namespace common\components\core;

use common\components\ActiveRecord;

interface ServiceInterface
{
    public function getModel();

    public function save(ActiveRecord $model);
    public function delete(ActiveRecord $model);
    public function find();
}