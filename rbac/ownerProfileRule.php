<?php

namespace app\rbac;

use Yii;
use yii\rbac\Rule;
use app\models\User;

class ownerProfileRule extends Rule
{
    public $name = 'ownerProfile';

    public function execute($user, $item, $params): bool
    {
        return isset($params['permission_id']) && $params['permission_id'] == $user;
    }
}