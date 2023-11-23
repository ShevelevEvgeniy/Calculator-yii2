<?php
namespace app\commands;

use Yii;
use yii\base\Exception;
use yii\console\Controller;

class RbacController extends Controller
{
    /**
     * @throws Exception
     * @throws \Exception
     */
    public function actionInit()
    {
        $auth = Yii::$app->authManager;
        $auth->removeAll();

        $ownerProfile = new \app\rbac\ownerProfileRule();
        $auth->add($ownerProfile);

        $seeOwnProfile = $auth->createPermission('onlyYourOwnProfile');
        $seeOwnProfile->description = 'the ability to view only your own profile';
        $seeOwnProfile->ruleName = $ownerProfile->name;
        $auth->add($seeOwnProfile);

        $user = $auth->createRole('user');
        $user->description = 'calculation execution is available, with the calculation result recorded in the history';
        $auth->add($user);
        $auth->addChild($user, $seeOwnProfile);

        $administrator = $auth->createRole('admin');
        $administrator->description = 'calculation execution is available, with the calculation result 
        recorded in the history, viewing, creating, deleting, changing users, viewing calculations of all users';
        $auth->add($administrator);
        $auth->addChild($administrator, $user);

        $userRoutes = [
            '/history/index',
            '/history/view',
            '/user/logout',
            '/user/profile',
        ];

        foreach ($userRoutes as $route) {
            $perm = $auth->createPermission($route);
            $auth->add($perm);
            $auth->addChild($user, $perm);
        }

        $adminRoutes = [
            '/*',
        ];

        foreach ($adminRoutes as $route) {
            $perm = $auth->createPermission($route);
            $auth->add($perm);
            $auth->addChild($administrator, $perm);
        }

        $auth->assign($administrator, 1);
        $auth->assign($user, 2);
    }
}