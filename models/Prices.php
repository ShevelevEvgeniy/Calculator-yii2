<?php

namespace app\models;

use yii\db\ActiveRecord;

class Prices extends ActiveRecord
{
    public static function findByParams(int $month_id, int $raw_type_id, int $tonnage_id)
    {
        return self::find()->select('price')->where([
            'month_id' => $month_id,
            'raw_type_id' => $raw_type_id,
            'tonnage_id' => $tonnage_id
        ])->scalar();
    }
}


