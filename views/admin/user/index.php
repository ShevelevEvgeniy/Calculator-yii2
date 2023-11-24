<?php

use yii\bootstrap5\Alert;
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
                    'delete' => function ($url, $model, $key) {
                        return Html::a(Html::img('@web/svg/trash.svg'), ['/administrator/delete', 'id' => $model->id], [
                            'title' => Yii::t('yii', 'Delete'),
                            'aria-label' => Yii::t('yii', 'Delete'),
                            'data-confirm' => Yii::t('yii', 'Вы уверены, что хотите удалить этот элемент?'),
                            'data-method' => 'post',
                            'data-pjax' => '0',
                            ]);
                        },
                    ],
                ],
            ],
        ]);
        ?>
</div>

<div class="row d-flex align-items-center">
        <?= Html::a('<span class="btn btn-success">Создать пользователя</span>',
            ['/administrator/create']); ?>
</div>
<div class="row d-flex align-items-center mt-2">
    <?php
    $flashMessages = [
        'success-delete' => ['class' => 'alert-success'],
        'error-delete' => ['class' => 'alert-danger'],
    ];

    foreach ($flashMessages as $key => $config) {
        if (Yii::$app->session->hasFlash($key)) {
            echo Alert::widget([
                'options' => ['class' => "col-8 " . $config['class'], 'role' => 'alert'],
                'body' => Yii::$app->session->getFlash($key),
            ]);
        }
    }
    ?>
</div>
