<?php

namespace app\models;
use yii\base\Model;
/**
 * @property $month
 * @property $tonnage
 * @property $raw_type
 */
class CalculatorFormForApi extends Model
{
    public $raw_type;
    public $tonnage;
    public $month;

    public function rules():array
    {
        $repository = new Repository();
        $errorMessege = 'не найден прайс для значения';
        return [
                [['month', 'raw_type', 'tonnage'], 'required', 'message' => "необходимо ввести {attribute}"],
                [['month'], 'in', 'range' => $repository->getMonthsList(), 'message' => $errorMessege],
                [['raw_type'], 'in', 'range' => $repository->getRawTypesList(), 'message' => $errorMessege],
                [['tonnage'], 'in', 'range' => $repository->getTonnagesList(), 'message' => $errorMessege],
            ];
    }

    public function attributeLabels():array
    {
        return [
            'month' => 'месяц',
            'raw_type' => 'тип сырья',
            'tonnage' => 'тоннаж',
        ];
    }
}
