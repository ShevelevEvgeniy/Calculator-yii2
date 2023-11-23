<?php

namespace app\commands;

use app\models\CalculatorFormForApi;
use app\models\Repository;
use yii\console\Controller;
use yii\console\ExitCode;
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
        $repository = new Repository();
        $model = new CalculatorFormForApi();
        $model->raw_type = $this->raw_type;
        $model->tonnage = $this->tonnage;
        $model->month = $this->month;

        if ($model->validate()) {
            echo 'месяц - ' . $this->month . PHP_EOL .
                'тип - ' . $this->raw_type . PHP_EOL .
                'тоннаж - ' . $this->tonnage . PHP_EOL .
                'результат - ' . $repository->getResultPriceByNames($model->month, $model->tonnage, $model->raw_type) . PHP_EOL;
            $month_string = [];
            $rows = [];
            foreach ($repository->getListPricesByType($model->raw_type) as $months => $value) {
                $month_string[] = $months;
                foreach ($value as $tonnage => $price) {
                    if (!array_key_exists($tonnage, $rows)) {
                        $rows[$tonnage][] = $tonnage;
                    }
                    $rows[$tonnage][] = $price;
                }
            }
            $table = Table::widget([
                'headers' => array_merge(['м/т'], $month_string),
                'rows' => $rows,
            ],
            );

            echo Console::ansiFormat($table, [BaseConsole::FG_YELLOW]);
            return ExitCode::OK;
        }
        $value = [
            'tonnage' => $this->tonnage,
            'raw_type' => $this->raw_type,
            'month' => $this->month
        ];

        $message = "выполнение команды завершено с ошибкой. " . PHP_EOL;
        foreach ($model->getErrors() as $parameter => $arrMessage) {
            $message .= array_reduce($arrMessage, fn($prevMessage, $nextMassege) => $prevMessage . $nextMassege .
                    (
                    $value[$parameter] !== "" ? " --$parameter" . "=" . $value[$parameter] : ""
                    ), '') . PHP_EOL;
        }
        $message .= 'проверьте корректность введенных значений' . PHP_EOL;
        echo Console::ansiFormat($message, [BaseConsole::FG_RED]);
        return ExitCode::DATAERR;
    }
}