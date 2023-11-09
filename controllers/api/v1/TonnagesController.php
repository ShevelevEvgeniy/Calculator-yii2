<?php

namespace app\controllers\api\v1;

use app\models\Repository;
use app\models\Tonnages;
use Yii;
use yii\helpers\ArrayHelper;
use yii\rest\Controller;
use yii\web\Response;

class TonnagesController extends Controller
{
    public function actionIndex(): array
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        Yii::$app->getResponse()->setStatusCode(200);
//        return ArrayHelper::map(Tonnages::find()->select('id, value')->all(), 'id', 'value');
        return array_values(Repository::getTonnagesList());
    }

    public function actionCreate()
    {
        $tonnage = new Tonnages();
        $tonnage->value = Yii::$app->request->post()['value'];
        if ($tonnage->save()) {
            Yii::$app->getResponse()->setStatusCode(200);
            return ;
        }
        Yii::$app->getResponse()->setStatusCode(400);
    }

    public function actionDelete()
    {
        $data = Yii::$app->request->getBodyParam('value');
        if(in_array($data, Repository::getTonnagesList())) {
            Tonnages::deleteAll("value = $data");
            Yii::$app->getResponse()->setStatusCode(200);
            return ;
        }
        Yii::$app->getResponse()->setStatusCode(400);
    }
}