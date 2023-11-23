<?php

namespace app\models;

use yii\db\ActiveRecord;

/** @property $name */

class RawTypes extends ActiveRecord
{
    public function rules():array
    {
        $repository = new Repository();
        return
            [
                [['name'], 'required', 'message' => "необходимо ввести {attribute}"],
                [['name'], 'string', 'length' => [3, 24], 'message' => 'не корректное значение {attribute}'],
                [['name'], 'in', 'range'  => $repository->getRawTypesList(), 'not' => true, 'message' => 'данный {attribute} уже существует'],
            ];
    }
}