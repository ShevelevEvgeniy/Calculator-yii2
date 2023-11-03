<?php

namespace app\models;

use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;

class Months extends ActiveRecord
{
    public static function findById($id)
    {
        return self::find()->select('name')->where(['id' => $id])->scalar();
    }

    public static function getIdAndName()
    {
        return ArrayHelper::map(self::find()->select('name, id')->asArray()->all(), 'id', 'name');
    }

    public static function getIdByName($name)
    {
        return self::find()->select('id')->where(['name' => $name])->scalar();
    }
}