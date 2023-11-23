<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\Response;

class SpaController extends Controller
{
    public function actionIndex()
    {
        return require_once Yii::getAlias('@app/web/index.html');
    }

    public function actionGetSpec()
    {
        Yii::$app->response->format = Response::FORMAT_RAW;
        Yii::$app->response->headers->set('Content-Type', 'application/x-yaml');

        ob_start();

        include_once Yii::getAlias('@app') . '/swagger/spec.yml';
        return ob_get_clean();
    }
}