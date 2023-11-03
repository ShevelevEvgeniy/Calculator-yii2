<?php
namespace app\controllers;
use app\models\CalculatorForm;
use app\models\Months;
use app\models\Prices;
use app\models\RawTypes;
use app\models\Tonnages;
use Yii;
use yii\bootstrap5\Html;
use yii\web\Controller;

class MySiteController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }
    public function actionCalculator()
    {
        $model = new CalculatorForm();

        $months = Months::getIdAndName();

        $raw_types = RawTypes::getIdAndName();

        $tonnages = Tonnages::getIdAndName();

        if ($model->load(YII::$app->request->post()) && $model->validate())
        {
            file_put_contents('../runtime/queue.job',
                "month = " . Months::findById($model->month_id) . PHP_EOL .
                "type = " . RawTypes::findById($model->raw_type_id) . PHP_EOL .
                "tonnage = " . Tonnages::findById($model->tonnage_id) . PHP_EOL);

            $result = Prices::findByParams($model->month_id, $model->raw_type_id, $model->tonnage_id);

            return $this->render('calculator',  compact('model', 'months', 'raw_types', 'tonnages', 'result'));
        };
        return $this->render('calculator',  compact('model', 'months', 'raw_types', 'tonnages'));
    }
}

