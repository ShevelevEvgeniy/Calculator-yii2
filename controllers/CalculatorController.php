<?php

namespace app\controllers;

use app\models\CalculatorFormForApi;
use app\models\History;
use app\models\Repository;
use Yii;
use yii\web\Controller;
use yii\web\Response;
use yii\widgets\ActiveForm;

class CalculatorController extends Controller
{
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }
    public function actionIndex()
    {
        $model = new CalculatorFormForApi();
        $repository = new Repository();

        $months = $repository->getMonthsList();
        $raw_types = $repository->getRawTypesList();
        $tonnages = $repository->getTonnagesList();


        if ($model->load(Yii::$app->request->post()) && Yii::$app->request->isAjax) {
            $ListPricesByType = $repository->getListPricesByType($model->raw_type);
            $result_price = $repository->getResultPriceByNames($model->month, $model->tonnage, $model->raw_type);

            if (!Yii::$app->user->isGuest) {
                $history = new History();
                $history->saveHistory($model);
            }

            file_put_contents('../runtime/queue.job',
                "month = " . $model->month . PHP_EOL .
                "type = " . $model->raw_type . PHP_EOL .
                "tonnage = " . $model->tonnage . PHP_EOL);

            return $this->renderAjax('result', compact('model', 'result_price', 'ListPricesByType'));
        }

        return $this->render('index', compact('model', 'months', 'raw_types', 'tonnages'));
    }

    public function actionValidateCalculatorForm()
    {
        $model = new CalculatorFormForApi();
        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }
    }

    public function actionRemoveCookie ()
    {
        Yii::$app->response->cookies->remove('alert-success');
    }
}


