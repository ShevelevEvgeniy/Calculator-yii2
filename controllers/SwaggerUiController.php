<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\Response;

class SwaggerUiController extends Controller
{
    public function actionIndex():string
    {
        return $this->render('index');
    }

    public function actionGetSpec()
    {
        YII::$app->response->format = Response::FORMAT_RAW;
        YII::$app->response->headers->set('Content-Type', 'application/x-yaml');
        ob_start();
        include_once YII::getAlias('@app') . '/swagger/spec.yml';
        return ob_get_clean();
    }
}

