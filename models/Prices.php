<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * show off @property
 * @property $month_id
 * @property $tonnage_id
 * @property $raw_type_id
 * @property $price
 */

class Prices extends ActiveRecord
{
    public function rules():array
    {
        $repository = new Repository();
        return
            [
                [['price', 'month_id', 'raw_type_id', 'tonnage_id'], 'required', 'message' => "необходимо ввести {attribute}"],
                [['price'], 'integer', 'message' => 'не корректное значение {attribute}'],
                [['month_id'], 'in', 'range' => array_keys($repository->getMonthsList()), 'message' => 'некорректное значение month'],
                [['raw_type_id'], 'in', 'range' => array_keys($repository->getRawTypesList()), 'message' => 'некорректное значение type'],
                [['tonnage_id'], 'in', 'range' => array_keys($repository->getTonnagesList()), 'message' => 'некорректное значение tonnage'],
            ];
    }
}