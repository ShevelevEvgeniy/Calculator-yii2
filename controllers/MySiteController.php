<?php
namespace app\controllers;
use app\models\CalculatorForm;
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
        $prices = Yii::$app->params['prices'];
        $model = new CalculatorForm();
        if ($model->load(YII::$app->request->post()) && $model->validate()) {
            file_put_contents('../runtime/queue.job', "month = $model->month \ntype = $model->type \ntonnage = $model->tonnage");
            $result = Html::tag('div', "Стоимость составит - " . $prices[$model->type]
                [$model->tonnage]
                [$model->month],
                ['class' => 'col'],
            );
            return $this->render('calculator',  ['model' => $model, 'prices' => $prices, 'result' => $result]);
        };
       return $this->render('calculator',  ['model' => $model, 'prices' => $prices]);
    }


}
