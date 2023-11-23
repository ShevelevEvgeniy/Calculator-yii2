<?php

namespace app\controllers;

use app\models\SignupForm;
use app\models\User;
use app\models\UserUpdateForm;
use Yii;
use yii\base\Exception;
use yii\web\Controller;
use yii\web\Response;
use yii\widgets\ActiveForm;

class AdministratorController extends Controller
{
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }
    public function actionUpdate($id)
    {
        $user = User::findOne($id);
        $model = new UserUpdateForm($user);

        if ($model->load(Yii::$app->request->post())) {
            $model->updateProfile();
            return $this->redirect('/admin/user/index');
        }
        return $this->render('/admin/user/update', ['model' => $model,]);
    }

    public function actionValidateUserUpdateForm($id = null): array
    {
        $user = ($id !== null) ? User::findOne($id) : null;
        $model = new UserUpdateForm($user);

        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }
        return [];
    }

    public function actionCreate()
    {
        $model = new SignupForm();

        if ($model->load(YII::$app->request->post())) {

            $model->save();
            return $this->redirect('/admin/user/index');
        }
        return $this->render('/admin/user/create', ['model' => $model]);
    }
}