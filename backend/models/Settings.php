<?php

namespace backend\models;

use common\components\core\traits\AttributesToInfoTrait;
use yii\db\ActiveRecord;
use yii\helpers\Json;

/**
 * Settings model
 *
 * @property integer $id
 * @property string $name
 * @property string $excerpt
 * @property string $description
 * @property Json $info
 * @property string $phone
 * @property string $email
 * @property integer $address
 * @property string $timetable
 */
class Settings extends ActiveRecord
{
    use AttributesToInfoTrait;

    public static function tableName()
    {
        return "settings";
    }

    public function rules()
    {
        return [
            [['name', 'description'], 'required']
        ];
    }

    public function attributesToInfo()
    {
        return [
            'facebook_link', 'insta_link', 'twitter_link', 'google_link'
        ];
    }
}