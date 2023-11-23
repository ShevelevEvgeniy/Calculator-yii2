<?php

namespace app\models;

use yii\db\ActiveRecord;

/** @property $value */

class Tonnages extends ActiveRecord
{
    public function rules():array
    {
        $repository = new Repository();
        return
            [
                [['value'], 'required', 'message' => "необходимо ввести {attribute}"],
                [['value'], 'integer', 'message' => 'некорректное значение {attribute}'],
                [['value'], 'in', 'range'  => $repository->getTonnagesList(), 'not' => true, 'message' => 'данный {attribute} уже существует'],
            ];
    }
}