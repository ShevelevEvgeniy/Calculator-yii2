<?php
namespace app\controllers\api\v1;

/** @var $prices */

use app\models\CalculatorForm;
use Yii;
use yii\rest\Controller;
use yii\web\Response;

class CalculatePriceController extends Controller
{
    protected function verbs()
    {
        return [
            'index'=> ['GET']
        ];
    }

    public function actionIndex(): array
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $prices = Yii::$app->params['prices'];

        $model = new CalculatorForm();
        $data = Yii::$app->request->get();

        $model->type = $data['type'];
        $model->tonnage = $data['tonnage'];
        $model->month = $data['month'];

        if ($model->validate())
        {
            $price = ['price' => $prices[$model->type][$model->tonnage][$model->month]];
            $price_list = [$data['type'] => $prices[$data['type']]];
            return ['price' => $price, 'price_list' => $price_list];
        }

        return $model->getErrors();
    }
}

