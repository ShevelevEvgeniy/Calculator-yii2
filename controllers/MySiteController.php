<?php

namespace app\controllers;

use app\models\CalculatorForm;
use Yii;
use yii\bootstrap5\Html;
use yii\web\Controller;

class MySiteController extends Controller
{
    public $result;
    public function actionIndex()
    {
        return $this->render('index');
    }
    public function actionCalculator()
    {
        $model = new CalculatorForm();
       if ($model->load(YII::$app->request->post())) {
            $this->result = html::tag('div', "Форма отправленна ( месяц - " . $model->month_id .
                ", материал сырья - " . $model->material_id . ", тоннаж - ". $model->tonnage_id . " )",
       ['class' => 'col']);
        }
       return $this->render('calculator',  ['model' => $model, 'result' => $this->result]);
    }

}
