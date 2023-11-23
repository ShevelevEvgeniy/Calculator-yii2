<?php

use yii\helpers\Html;
use yii\grid\GridView;
use mdm\admin\components\Helper;

/* @var $this yii\web\View */
/* @var $searchModel mdm\admin\models\searchs\User */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('rbac-admin', 'Users');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                'id',
                'username',
                'email:email',
                [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{delete} {update} {view}',
                'contentOptions' => ['style' => 'width: 100px;'],
                'buttons' => [
                    'update' => function($url, $model) {
                        return Html::a(Html::img('@web/svg/update.svg'),
                            ['/administrator/update', 'id' => $model->id]);
                        },
                    ]
                ],
            ],
        ]);
        ?>
</div>
<div>
    <div class = 'col-4 p-0'>
        <?= Html::a('<span class="btn btn-success">Создать пользователя</span>',
            ['/administrator/create']); ?>
    </div>
</div>
