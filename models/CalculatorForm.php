<?php
namespace app\models;
use Yii;
use yii\base\Model;

class CalculatorForm extends Model
{
    public $type;
    public $tonnage;
    public $month;

    public function rules()
    {
        $prices = Yii::$app->params['prices'];
        $errorMessege = 'не найден прайс для значения';
        return
             [
                 [['month', 'type', 'tonnage'], 'required', 'message' => "необходимо ввести {attribute}"],
                 [['month'], 'in', 'range' => array_keys($prices['шрот'][25]), 'message' =>  $errorMessege],
                 [['type'], 'in', 'range' => array_keys($prices), 'message' =>  $errorMessege],
                 [['tonnage'], 'in', 'range' => array_keys($prices['шрот']), 'message' =>  $errorMessege],
             ];
    }

    public function attributeLabels()
    {
        return [
            'month' => 'месяц',
            'type' => 'тип сырья',
            'tonnage' => 'тоннаж',
        ];
    }
}