<?php

namespace app\controllers\api\v1;

use app\models\Months;
use app\models\Repository;
use Yii;
use yii\rest\Controller;
use yii\web\Response;

class MonthsController extends Controller
{
        public function actionIndex(): array
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        Yii::$app->getResponse()->setStatusCode(200);
        return array_values(Repository::getMonthsList());
    }


    public function actionCreate()
    {
        $month = new Months();
        $month->name = YII::$app->request->post()['name'];
        if ($month->save()) {
            Yii::$app->getResponse()->setStatusCode(200);
            return ;
        }
        Yii::$app->getResponse()->setStatusCode(400);

    }

    public function actionDelete()
    {
        $data = Yii::$app->request->getBodyParam('name');
        if(in_array($data, Repository::getMonthsList())) {
            Months::deleteAll("name = '$data'");
            Yii::$app->getResponse()->setStatusCode(200);
            return ;
        }
        Yii::$app->getResponse()->setStatusCode(400);

    }
}
