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
            return $this->render('calculator',  ['model' => $model, 'prices' => $prices]);
        };
       return $this->render('calculator',  ['model' => $model, 'prices' => $prices]);
    }

    public function actionAaaaa()
    {
        $prices = Yii::$app->params['prices'];
        $model = new CalculatorForm();
        if ($model->load(YII::$app->request->post()) && $model->validate()) {
            file_put_contents('../runtime/queue.job', "month = $model->month \ntype = $model->type \ntonnage = $model->tonnage");
            return $this->render('aaaaa',  ['model' => $model, 'prices' => $prices]);
        };
        return $this->render('aaaaa',  ['model' => $model, 'prices' => $prices]);
    }



}
