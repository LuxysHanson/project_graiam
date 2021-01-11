<?php

namespace common\models;

use common\components\enums\UsersEnum;
use Yii;
use yii\base\NotSupportedException;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * Users model
 *
 * @property integer $id
 * @property string $username
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property string $verification_token
 * @property string $auth_key
 * @property integer $status
 * @property string $ts
 * @property int $role
 * @property int $is_blocked
 */
class Users extends ActiveRecord implements IdentityInterface
{

    public static function tableName()
    {
        return "users";
    }

    public function rules()
    {
        return [
            [['username'], 'string', 'max'=>'255'],
            [['username', 'email'], 'unique'],
            [['role', 'is_blocked'], 'integer'],
            ['status', 'default', 'value' => UsersEnum::STATUS_INACTIVE],
            ['status', 'in', 'range' => array_keys(UsersEnum::labels())],
            [$this->attributesSafe(), 'safe'],
        ];
    }

    private function attributesSafe()
    {
        return [
            'ts',
            'auth_key',
            'password_hash',
            'password_reset_token',
            'verification_token'
        ];
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id, 'status' => UsersEnum::STATUS_ACTIVE]);
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    /**
     * Находит пользователя по имени пользователя
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username, 'status' => UsersEnum::STATUS_ACTIVE]);
    }

    /**
     * Проверяет пароль
     *
     * @param string $password
     * @return bool
     */
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }
}