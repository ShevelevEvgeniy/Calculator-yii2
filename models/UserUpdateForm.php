<?php

namespace app\models;

/**
 * @property string $username
 * @property string $email
 */

class UserUpdateForm extends User
{
    public $userBefore;

    public function __construct($user, $config = [])
    {
        if ($user !== null) {
            $this->userBefore = $user;
            $this->id = $user->id;
            $this->username = $user->username;
            $this->email = $user->email;
        }
        parent::__construct($config);
    }

    public static function tableName(): string
    {
        return 'user';
    }

    public function rules(): array
    {
        return [
            [['username', 'email'], 'required', 'message' => 'Заполните поле'],
            ['id', 'integer'],
            ['username', 'match', 'pattern' => '/^[a-zA-Zа-яА-Я\s.]+$/u', 'message' => 'Неверный формат'],
            ['email', 'email', 'message' => 'Неверный формат'],
            ['email', 'unique', 'targetClass' => User::class, 'filter' => [
                '<>', 'id', $this->id], 'message' => 'такой E-mail уже существует', 'skipOnEmpty' => false
            ],
        ];
    }

    public function updateProfile(): bool
    {
        if ($this->validate() && $this->isAttributeChanged('username') || $this->isAttributeChanged('email')) {
            $userAfter = $this->userBefore;
            $userAfter->username = $this->username;
            $userAfter->email = $this->email;
            $userAfter->save();
            return true;
        }
        return false;
    }

    public function attributeLabels():array
    {
        return [
            'username' => 'Имя',
            'email' => 'E-mail',
            'id' => 'ID',
        ];
    }
}