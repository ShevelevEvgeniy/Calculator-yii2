<?php

namespace app\controllers\api\v1;

/** @var $prices */

use app\models\CalculatorFormForApi;
use app\models\Months;
use app\models\Prices;
use app\models\RawTypes;
use app\models\Tonnages;
use Yii;
use yii\rest\Controller;
use yii\web\Response;

class CalculatePriceController extends Controller
{
    protected function verbs()
    {
        return [
            'index' => ['GET']
        ];
    }

    public function actionIndex(): array
    {
        Yii::$app->response->format = Response::FORMAT_JSON;

        $model = new CalculatorFormForApi();
        $data = Yii::$app->request->get();

        $model->raw_type = $data['raw_type'];
        $model->tonnage = $data['tonnage'];
        $model->month = $data['month'];

        if ($model->validate()) {
            $price = Prices::findByParams(
                RawTypes::getIdByName($model->raw_type),
                Tonnages::getIdByValue($model->tonnage),
                Months::getIdByName($model->month));

            $price_list_by_type =[];
            foreach (Months::getIdAndName() as $key => $value) {
                foreach (Tonnages::getIdAndName() as $key2 => $value2) {
                    $price_list_by_type[$value][$value2] = Prices::findByParams($key, RawTypes::getIdByName($model->raw_type), $key2);
                }
            }
            return ['price' => $price, 'price_list' => [$data['raw_type'] => $price_list_by_type]];

        }


        return $model->getErrors();
    }
}

