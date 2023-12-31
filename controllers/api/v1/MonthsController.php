<?php

namespace app\controllers\api\v1;

use app\models\Months;
use app\models\Repository;
use Yii;
use yii\rest\Controller;
use yii\web\Response;

class MonthsController extends Controller
{
    private Repository $repository;
    public function __construct($id, $module, Repository $repository, $config = [])
    {
        $this->repository = $repository;
        parent::__construct($id, $module, $config);
    }

    public function actionIndex(): array
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        Yii::$app->getResponse()->setStatusCode(200);
        return array_values($this->repository->getMonthsList());
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
        if (in_array($data, $this->repository->getMonthsList())) {
            Months::deleteAll("name = '$data'");
            Yii::$app->getResponse()->setStatusCode(200);
            return ;
        }
        Yii::$app->getResponse()->setStatusCode(400);

    }
}
