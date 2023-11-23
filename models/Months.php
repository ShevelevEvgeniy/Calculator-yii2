<?php

namespace app\models;

use Symfony\Component\BrowserKit\Response;
use yii\db\ActiveRecord;

/** @property $name */

class Months extends ActiveRecord
{
    public function rules():array
    {
        $repository = new Repository();
        return
        [
            [['name'], 'required', 'message' => "необходимо ввести {attribute}"],
            [['name'], 'string', 'message' => 'некорректное значение {attribute}'],
            [['name'], 'in', 'range'  => $repository->getMonthsList(), 'not' => true, 'message' => 'данный {attribute} уже существует'],
        ];
    }
}