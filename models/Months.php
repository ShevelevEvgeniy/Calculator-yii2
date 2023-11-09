<?php

namespace app\models;

use yii\db\ActiveRecord;

/** @property $name */

class Months extends ActiveRecord
{
    public function rules():array
    {
        return
        [
            [['name'], 'required', 'message' => "необходимо ввести {attribute}"],
            [['name'], 'string', 'message' => 'некорректное значение {attribute}'],
            [['name'], 'in', 'range'  => Repository::getMonthsList(), 'not' => true, 'message' => 'данный {attribute} уже существует'],
        ];
    }
}