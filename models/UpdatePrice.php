<?php

namespace app\models;

use yii\base\Model;

class UpdatePrice extends Model
{
    public int $id;
    public int $price;

    public function rules():array
    {
        return [
            [['id', 'price'], 'required', 'message' => "необходимо ввести {attribute}"],
            [['price', 'id'], 'integer'],
            ['id', 'in', 'range' => array_values(Prices::find()->select('id')->all()), 'message' => 'некорректное значение month'],
        ];
    }
}