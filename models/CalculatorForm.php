<?php

namespace app\models;

use yii\base\Model;

class CalculatorForm extends Model
{
    public $material_id;
    public $tonnage_id;
    public $month_id;
    public $materials = ['шрот', 'жмых', 'соя',];
    public $tonnages = [25, 50, 75, 100];
    public $months = ['январь', 'февраль', 'август', 'сентябрь', 'октябрь', 'ноябрь',];

    public function rules()
    {
         return
             [
                 [['month_id', 'material_id', 'tonnage_id'], 'required'],
             ];
    }

/*    public function attributeLabels()
    {
        return [
            'month_id' => 'месяц',
            'material_id' => 'тип сырья',
            'tonnage_id' => 'тоннаж',
        ];
    }*/


}