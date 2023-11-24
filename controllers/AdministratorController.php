<?php

namespace app\controllers;

use app\models\SignupForm;
use app\models\User;
use app\models\UserUpdateForm;
use Yii;
use yii\base\Exception;
use yii\db\StaleObjectException;
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
            Yii::$app->session->setFlash('success-update', 'Данные успешно обновленны!');
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

    /**
     * @throws Exception
     */
    public function actionCreate()
    {
        $model = new SignupForm();

        if ($model->load(YII::$app->request->post())) {
            Yii::$app->session->setFlash('success-create', 'Пользователь успешно добавлен!');
            $model->save();
            return $this->redirect('/admin/user/index');
        }
        Yii::$app->session->setFlash('error-create', 'Что-то пошло не так. Проверте введеные данные');
        return $this->render('/admin/user/create', ['model' => $model]);
    }

    /**
     * @throws StaleObjectException
     * @throws \Throwable
     */
    public function actionDelete($id): Response
    {
        if (!(Yii::$app->authManager->checkAccess($id, 'admin'))) {
            User::findOne($id)->delete();
            Yii::$app->session->setFlash('success-delete', 'Операция успешно выполнена!');
            return $this->redirect('/admin/user/index');
        }
        Yii::$app->session->setFlash('error-delete', 'У вас нет прав для удаления этого пользователя.');
        return $this->redirect('/admin/user/index');
    }
}