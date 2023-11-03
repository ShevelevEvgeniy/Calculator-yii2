<?php
namespace app\commands;

use app\models\CalculatorFormForApi;
use app\models\Months;
use app\models\Prices;
use app\models\RawTypes;
use app\models\Tonnages;
use yii\console\Controller;
use yii\console\widgets\Table;
use yii\helpers\BaseConsole;
use yii\helpers\Console;

class CalculateController extends Controller
{
    public $month;
    public $raw_type;
    public $tonnage;


    public function options($actionID)
    {
        return ['month', 'raw_type', 'tonnage'];
    }

    public function actionIndex()
    {
        $model = new CalculatorFormForApi();
        $model->raw_type = $this->raw_type;
        $model->tonnage = $this->tonnage;
        $model->month = $this->month;

        if ($model->validate()) {
            echo 'месяц - ' . $this->month . PHP_EOL .
                'тип - ' . $this->raw_type . PHP_EOL .
                'тоннаж - ' . $this->tonnage . PHP_EOL .
                'результат - ' . $price = Prices::findByParams(
                    RawTypes::getIdByName($model->raw_type),
                    Tonnages::getIdByValue($model->tonnage),
                    Months::getIdByName($model->month)) . PHP_EOL;
            $rows = [];
            foreach (Tonnages::getIdAndName() as $key => $value) {
                $add_rows = [];
                $add_rows[] = $value;
                foreach (Prices::find()->select('price')->where(
                    [
                        'raw_type_id' => RawTypes::getIdByName($model->raw_type),
                        'tonnage_id' => $key,
                    ]
                    )->asArray()->all() as $key2 => $value2) {
                            $add_rows[] = $value2;
                        }
                $rows[] = $add_rows;
            }
            $table = Table::widget([
                'headers' => array_merge(['м/т'], Months::getIdAndName()),
                'rows' => $rows,
                ],
            );
            echo Console::ansiFormat($table, [BaseConsole::FG_YELLOW]);

        } else {
            $value = [
                'tonnage' => $this->tonnage,
                'raw_type' => $this->raw_type,
                'month' => $this->month
            ];

            $message = "выполнение команды завершено с ошибкой. " . PHP_EOL;
            foreach ($model->getErrors() as $parameter => $arrMessage) {
                $message .= array_reduce($arrMessage, fn($prevMessage, $nextMassege) =>
                    $prevMessage . $nextMassege .
                    (
                        $value[$parameter] !== "" ? " --$parameter" . "=" . $value[$parameter] : ""
                    ), ''). PHP_EOL;
            }
            $message .= 'проверьте корректность введенных значений' . PHP_EOL;
            echo Console::ansiFormat($message, [BaseConsole::FG_RED]);
        }
    }

}