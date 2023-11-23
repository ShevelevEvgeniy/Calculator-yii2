<?php

namespace app\models;

use Yii;
use yii\base\Exception;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * show off @property
 * @property $id
 * @property $username
 * @property $email
 * @property $password_hash
 * @property $auth_key
 */

class User extends ActiveRecord implements IdentityInterface
{
    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['access_token' => $token]);
    }

    public function getId()
    {
        return $this->id;
    }

    public function getAuthKey(): ?string
    {
        return $this->auth_key;
    }

    public function validateAuthKey($authKey):bool
    {
        return $this->getAuthKey() === $authKey;
    }

    /**
     * @throws Exception
     */
    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

    public static function findByEmail($email): ?User
    {
        return User::findOne(['email' => $email]);
    }

    public function validatePassword($password): bool
    {
        return (Yii::$app->getSecurity()->validatePassword($password, $this->password_hash));
    }
}