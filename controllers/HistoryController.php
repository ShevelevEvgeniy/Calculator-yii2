<?php

namespace app\controllers;

use app\models\History;
use app\models\HistorySearch;
use Yii;
use yii\db\StaleObjectException;
use yii\web\Controller;

class HistoryController extends Controller
{
    public function actionIndex(): string
    {
        $searchHistory = new HistorySearch();
        $dataProvider = $searchHistory->search(Yii::$app->request->get());

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'searchHistory' => $searchHistory,
        ]);
    }

    /**
     * @throws \Throwable
     * @throws StaleObjectException
     */
    public function actionDelete($id): \yii\web\Response
    {
        History::findOne($id)->delete();
        return $this->redirect('index');
    }

    public function actionView($id): string
    {
        $model = History::findOne($id);
        return $this->render('table', ['model' => $model]);

    }
}