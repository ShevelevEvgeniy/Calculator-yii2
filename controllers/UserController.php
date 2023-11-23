<?php

namespace app\controllers;

use app\models\LoginForm;
use app\models\SignupForm;
use app\models\User;
use Yii;
use yii\base\Exception;
use yii\web\Cookie;
use yii\web\Controller;
use yii\web\ForbiddenHttpException;
use yii\web\Response;
use yii\widgets\ActiveForm;

class UserController extends Controller
{
    /**
     * @throws Exception
     */
    public function actionSignup()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $signup_model = new SignupForm();

        if ($signup_model->load(YII::$app->request->post())) {

            $signup_model->save();
            return $this->redirect('login');
        }
        return $this->render('signup', ['signup_model' => $signup_model]);
    }
    public function actionValidationSignupForm()
    {
        $model = new SignupForm();
        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }
    }

    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $login_model = new LoginForm();
        if ($login_model->load(Yii::$app->request->post()) && $login_model->login()) {
            Yii::$app->response->cookies->add(new Cookie([
                'name' => 'alert-success',
                'value' => true
            ]));
            return $this->goHome();
        }
        return $this->render('login', ['login_model' => $login_model]);
    }

    public function actionLogout(): Response
    {
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        Yii::$app->user->logout();
        return $this->goHome();
    }

    public function actionProfile($id)
    {
        if (Yii::$app->user->can('onlyYourOwnProfile', ['permission_id' => $id])) {
            $model = User::findOne($id);
            return $this->render('profile', [
                'model' => $model,
            ]);
        }
        throw new ForbiddenHttpException(Yii::t('yii', 'You are not allowed to perform this action.'));
    }
}
//    public function actionCheck(): string
//    {
//        $auth = Yii::$app->authManager;
//        $roleName = 'user';
//        $userId = Yii::$app->user->id;
//        if ($auth->checkAccess($userId, $roleName)) {
//            return 'Пользователь является администратором.';
//        } else {
//            return 'Пользователь не является администратором.';
//        }
//    }
