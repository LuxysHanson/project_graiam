<?php

namespace backend\models\forms;

use yii\base\Model;

class ProfileForm extends Model
{
    public $image;

    public $password;


    public function rules()
    {
        return [
            ['image', 'file', 'extensions' => ['jpeg', 'jpg', 'png']]
        ];
    }

    public function attributeLabels()
    {
        return [
            'image' => \Yii::t('app', "Логотип администратора")
        ];
    }

}