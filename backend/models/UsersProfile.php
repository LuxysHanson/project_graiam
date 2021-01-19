<?php

namespace backend\models;

use common\components\ActiveRecord;
use common\components\core\traits\AttributesToInfoTrait;
use Yii;
use yii\helpers\Json;

/**
 * UsersProfile model
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $last_name
 * @property string $first_name
 * @property string $middle_name
 * @property Json $info
 * @property string $phone
 * @property string $image
 * @property integer $sex
 * @property string $birthday
 */
class UsersProfile extends ActiveRecord
{
    use AttributesToInfoTrait;

    public static function tableName()
    {
        return "relations.user_profile";
    }

    public function rules()
    {
        return [
            [['image'], 'safe'],
            [['user_id'], 'integer']
        ];
    }

    public function beforeSave($insert)
    {
        $this->user_id = Yii::$app->user->identity->id;
        return parent::beforeSave($insert);
    }

    public function attributeLabels()
    {
        return [
            'last_name' => Yii::t('app', "Фамилия"),
            'first_name' => Yii::t('app', "Имя"),
            'middle_name' => Yii::t('app', "Отчество"),
            'phone' => Yii::t('app', "Номер телефона"),
            'image' => Yii::t('app', "Логотип пользователя"),
            'sex' => Yii::t('app', "Пол"),
            'birthday' => Yii::t('app', "День рождения")
        ];
    }
}