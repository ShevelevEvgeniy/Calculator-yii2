<?php

namespace app\models;
use yii\base\Model;

class CalculatorFormForApi extends Model
{
    public $raw_type;
    public $tonnage;
    public $month;

    public function rules()
    {
        $errorMessege = 'не найден прайс для значения';
        return
            [
                [['month', 'raw_type', 'tonnage'], 'required', 'message' => "необходимо ввести {attribute}"],
                [['month'], 'in', 'range' => Months::getIdAndName(), 'message' => $errorMessege],
                [['raw_type'], 'in', 'range' => RawTypes::getIdAndName(), 'message' => $errorMessege],
                [['tonnage'], 'in', 'range' => Tonnages::getIdAndName(), 'message' => $errorMessege],
            ];
    }

    public function attributeLabels()
    {
        return [
            'month' => 'месяц',
            'raw_type' => 'тип сырья',
            'tonnage' => 'тоннаж',
        ];
    }
}
