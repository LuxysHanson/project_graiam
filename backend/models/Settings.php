<?php

namespace backend\models;

use common\components\ActiveRecord;
use common\components\core\traits\AttributesToInfoTrait;
use common\models\Users;
use Yii;

use yii\helpers\Json;

/**
 * Settings model
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $name
 * @property string $excerpt
 * @property string $description
 * @property Json $info
 * @property string $phone
 * @property string $email
 * @property integer $address
 * @property string $timetable
 * @property string $facebook_link
 * @property string $insta_link
 * @property string $twitter_link
 * @property string $google_link
 */
class Settings extends ActiveRecord
{
    use AttributesToInfoTrait;

    /* Текущий шаблон */
    public $template;

    public static function tableName()
    {
        return "settings";
    }

    public function rules()
    {
        return [
            [['user_id'], 'integer'],
            [['name', 'description'], 'string'],
            [['name', 'description'], 'required', 'when' => function () {
                return $this->template == "index";
            }],
            [array_merge($this->attributesToInfo(), $this->attributesToSafe()), 'safe']
        ];
    }

    public function beforeSave($insert)
    {
        $this->user_id = Yii::$app->user->id;
        return parent::beforeSave($insert);
    }

    public function attributesToInfo()
    {
        return [
            'facebook_link', 'insta_link', 'twitter_link', 'google_link'
        ];
    }

    public function attributesToSafe()
    {
        return [
            'excerpt',
            'info',
            'phone',
            'email',
            'address',
            'timetable'
        ];
    }

    public function attributeLabels()
    {
        return [
            'name' => Yii::t('app', "Название сайта"),
            'description' => Yii::t('app', "Описание сайта"),
            'excerpt' => Yii::t('app', "Краткое описание для сайта"),
            'phone' => Yii::t('app', "Номер телефона"),
            'email' => Yii::t('app', "E-mail"),
            'address' => Yii::t('app', "Адрес компании"),
            'timetable' => Yii::t('app', "График работы")
        ];
    }

    public function getUser()
    {
        return $this->hasOne(Users::class, [ 'id' => 'user_id']);
    }
}