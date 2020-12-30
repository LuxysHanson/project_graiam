<?php
namespace common\models\forms;

use common\models\Users;
use Yii;
use yii\base\Model;

/**
 * Class LoginForm
 * @package common\models\forms
 */
class LoginForm extends Model
{
    public $username;
    public $password;
    public $rememberMe;

    private $_user;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'password'], 'required'],
            ['rememberMe', 'boolean'],
            ['password', 'validatePassword'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'username' => Yii::t('app', "Логин"),
            'password' => Yii::t('app', "Пароль")
        ];
    }

    /**
     * Проверяет пароль
     *
     * @param string $attribute
     * @param array $params
     */
    public function validatePassword($attribute)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();
            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError($attribute, Yii::t('app', "Неверный логин или пароль"));
            }
        }
    }

    /**
     * Находит пользователя по [[имя пользователя]]
     *
     * @return Users|null
     */
    public function getUser()
    {
        if ($this->_user === null) {
            $this->_user = Users::findByUsername($this->username);
        }

        return $this->_user;
    }
}
