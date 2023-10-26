<?php
namespace app\commands;

use Yii;
use yii\console\Controller;
use app\models\CalculatorForm;
use yii\console\widgets\Table;
use yii\helpers\BaseConsole;
use yii\helpers\Console;

class CalculateController extends Controller
{
    public $month;
    public $type;
    public $tonnage;


    public function options($actionID)
    {
        return ['month', 'type', 'tonnage'];
    }

    public function actionIndex()
    {
        $prices = Yii::$app->params['prices'];
        $model = new CalculatorForm();
        $model->month = $this->month;
        $model->type = $this->type;
        $model->tonnage = $this->tonnage;
        $value = ['tonnage' => $model->tonnage, 'type' => $model->type, 'month' => $model->month];
        if ($model->validate())
        {
            echo 'месяц - ' . $this->month . PHP_EOL .
                'тип - ' . $this->type . PHP_EOL .
                'тоннаж - ' . $this->tonnage . PHP_EOL .
                'результат - ' . $prices[$this->type][$this->tonnage][$this->month] . PHP_EOL;
            $rows = [];
            foreach ($prices[$model->type] as $key => $value)
            {
                $rows_add = [];
                $rows_add[] = $key;
                foreach ($prices[$model->type][$key] as $key2 => $value2)
                {
                    $rows_add[] = $value2;
                }
                $rows[] =  $rows_add;
            }
            $table = Table::widget([
                'headers' => array_merge(['м/т'], array_keys($prices[$model->type][25])),
                'rows' => $rows,
                ],
            );
            echo Console::ansiFormat($table, [BaseConsole::FG_YELLOW]);
        } else
        {
            $message = "выполнение команды завершено с ошибкой. " . PHP_EOL;
            foreach ($model->getErrors() as $parameter => $arrMessage)
            {
                $message .= array_reduce($arrMessage, fn($prevMessage, $nextMassege) =>
                    $prevMessage . $nextMassege . ($value[$parameter] !== "" ? " --$parameter" . "=" . $value[$parameter] : ""), ''). PHP_EOL;
            }
            $message .= 'проверьте корректность введенных значений' . PHP_EOL;
            echo Console::ansiFormat($message, [BaseConsole::FG_RED]);
        }
    }
}