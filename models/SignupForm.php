<?php

namespace app\models;

use Yii;
use yii\base\Exception;
use yii\base\Model;

class SignupForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $password_repeat;

    public function rules():array
    {
        return [
            [['username', 'email', 'password', 'password_repeat'], 'required', 'message' => 'Заполните поле'],

            ['username', 'match', 'pattern' => '/^[a-zA-Zа-яА-Я\s.]+$/u', 'message' => 'Неверный формат'],

            ['email', 'email', 'message' => 'Не верный формат'],
            ['email', 'unique', 'targetClass' => User::class, 'targetAttribute' => 'email', 'message' => 'Аккаунт с таким E-mail уже существует'],

            ['password', 'match', 'pattern' => '/^(?=.*\d)[A-Za-z0-9]+$/', 'message' => 'В пароле должна быть минимум одна цифра'],

            ['password_repeat', 'compare', 'compareAttribute' => 'password', 'message' => 'Пароль не совпадает'],
        ];
    }

    /**
     * @throws Exception
     * @throws \Exception
     */
    public function save(): ?User
    {
        if ($this->validate()) {
            $user = new User();
            $user->username = $this->username;
            $user->email = $this->email;
            $user->password_hash = Yii::$app->security->generatePasswordHash($this->password);
            $user->generateAuthKey();
            $user->save();

            $auth = Yii::$app->authManager;
            $userRole = $auth->getRole('user');
            $auth->assign($userRole, $user->getId());

            return $user;
        }
        return null;
    }

    public function attributeLabels():array
    {
        return [
            'username' => 'Имя',
            'email' => 'Е-mail',
            'password' => 'Пароль',
            'password_repeat' => 'Повторите пароль',
        ];
    }
}