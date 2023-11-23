<?php

namespace app\controllers\api\v1;

use app\models\CalculatorFormForApi;
use app\models\Repository;
use Yii;
use yii\rest\Controller;
use yii\web\Response;

class CalculateController extends Controller
{
    protected function verbs():array
    {
        return [
            'index' => ['GET']
        ];
    }

    public function actionIndex():array
    {
        Yii::$app->response->format = Response::FORMAT_JSON;

        $repository = new Repository();
        $model = new CalculatorFormForApi();
        $data = Yii::$app->request->get();

        $model->raw_type = $data['type'];
        $model->tonnage = $data['tonnage'];
        $model->month = $data['month'];

        if ($model->validate()) {
            $price = $repository->getResultPriceByNames($model->month, $model->tonnage, $model->raw_type);
            $price_list = $repository->getListPricesByType($model->raw_type);
            return ['price' => $price, 'price_list' => [$model->raw_type => $price_list]];
        }
        return $model->getErrors();
    }
}