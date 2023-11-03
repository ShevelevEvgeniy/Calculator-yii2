<?php

namespace app\models;

use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;

class Tonnages extends ActiveRecord
{
    public static function findById($id)
    {
        return self::find()->select('value')->where(['id' => $id])->scalar();
    }
    public static function getIdAndName()
    {
        return ArrayHelper::map(self::find()->select('value, id')->asArray()->all(), 'id', 'value');
    }
    public static function getIdByValue($value)
    {
        return self::find()->select('id')->where(['value' => $value])->scalar();
    }
}