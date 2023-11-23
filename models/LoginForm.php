<?php

namespace app\models;

use Yii;
use yii\base\Model;
class LoginForm extends Model
{
    public $email;
    public $password;
    public $rememberMe;

    public function rules():array
    {
        return [
            [['email', 'password'], 'required', 'message' => 'Заполните поле'],
            ['password', 'validatePassword'],

        ];
    }


//    public function getUser()
//    {
//        if ($this->_user === false) {
//            $this->_user = User::findByEmail($this->email);
//        }
//
//        return $this->_user;
//    }
    public function getUser(): ?User
    {
        return User::findByEmail($this->email);
    }
    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();

            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError($attribute, 'Incorrect username or password.');
            }
        }
    }

    public function login(): bool
    {
        if ($this->validate()) {
            return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600*24*30 : 0);
        }
        return false;
    }

    public function attributeLabels():array
    {
        return [
            'email' => 'Е-mail',
            'password' => 'Пароль',
        ];
    }

}