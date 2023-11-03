<?php
namespace app\models;
use Yii;
use yii\base\Model;

class CalculatorForm extends Model
{
    public $raw_type_id;
    public $tonnage_id;
    public $month_id;

    public function rules()
    {
        $errorMessege = 'не найден прайс для значения';
        return
             [
                 [['month_id', 'raw_type_id', 'tonnage_id'], 'required', 'message' => "необходимо ввести {attribute}"],
                 [['month_id'], 'in', 'range' => Months::find()->select('id')->asArray()->column(), 'message' => $errorMessege],
                 [['raw_type_id'], 'in', 'range' => RawTypes::find()->select('id')->asArray()->column(), 'message' => $errorMessege],
                 [['tonnage_id'], 'in', 'range' => Tonnages::find()->select('id')->asArray()->column(), 'message' => $errorMessege],
             ];
    }

    public function attributeLabels()
    {
        return [
            'month_id' => 'месяц',
            'raw_type_id' => 'тип сырья',
            'tonnage_id' => 'тоннаж',
        ];
    }
}