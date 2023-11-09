<?php

namespace app\controllers;

use app\models\CalculatorFormForApi;
use app\models\Repository;
use Yii;
use yii\bootstrap5\Html;
use yii\web\Controller;

class SiteController extends Controller
{
    public function actions(): array
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionCalculator(): string
    {
        $model = new CalculatorFormForApi();

        $months = Repository::getMonthsList();
        $raw_types = Repository::getRawTypesList();
        $tonnages = Repository::getTonnagesList();

        if ($model->load(YII::$app->request->post()) && $model->validate()) {
            file_put_contents('../runtime/queue.job',
                "month = " . $model->month . PHP_EOL .
                "type = " . $model->raw_type . PHP_EOL .
                "tonnage = " . $model->tonnage . PHP_EOL);
        };
        return $this->render('calculator', compact('model', 'months', 'raw_types', 'tonnages'));
    }
}

