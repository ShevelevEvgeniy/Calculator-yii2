<?php

namespace app\controllers\api\v1;

use app\models\CalculatorFormForApi;
use app\models\Prices;
use app\models\Repository;
use app\models\UpdatePrice;
use Exception;
use Yii;
use yii\rest\Controller;


class PricesController extends Controller
{
    public function actionIndex()
    {
        $model = new CalculatorFormForApi();
        $data = Yii::$app->request->get();

        $model->raw_type = $data['type'];
        $model->tonnage = $data['tonnage'];
        $model->month = $data['month'];
        if ($model->validate()) {
            $price = Repository::getResultPriceByNames($model->month, $model->tonnage, $model->raw_type);
            if ($price == 0) {
                Yii::$app->getResponse()->setStatusCode(404);
                return null;
            }
            Yii::$app->getResponse()->setStatusCode(200);
            return $price;
        }
        Yii::$app->getResponse()->setStatusCode(400);
    }

    public function actionCreate()
    {
        $model = new CalculatorFormForApi();
        $data = Yii::$app->request->post();

        $model->raw_type = $data['type'];
        $model->tonnage = $data['tonnage'];
        $model->month = $data['month'];

        try {
            if ($model->validate()) {
                Repository::createPrice($model->month, $model->raw_type, $model->tonnage, $data['price']);
                Yii::$app->getResponse()->setStatusCode(200);
                return;
            }
        } catch (Exception $e) {
            Yii::$app->getResponse()->setStatusCode(400);
        }
    }

    function actionUpdate()
    {
        $update_price = new UpdatePrice();
        $data = Yii::$app->request->bodyParams;
        $update_price->id = $data['id'];
        $update_price->price = $data['price'];
        if ($update_price->validate()) {
            Repository::updatePrices($update_price->id, $update_price->price);
            Yii::$app->getResponse()->setStatusCode(200);
            return;
        }
        Yii::$app->getResponse()->setStatusCode(400);
    }
}