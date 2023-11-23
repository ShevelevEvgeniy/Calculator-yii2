<?php
/**
 * @var $dataProvider
 * @var $searchHistory
 * @var $repository
 * @var $months
 * @var $raw_types
 * @var $tonnages
 */

use yii\grid\GridView;
use yii\bootstrap5\Html;
use kartik\datetime\DateTimePicker;

$this->title = 'История расчетов';
?>

<div class="container my-5">
    <?php
        echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchHistory,
        'options' => ['class' => 'tableHistory text-center'],
        'rowOptions' => ['class' => 'rowHistory'],
        'tableOptions' => ['class' => 'table table-hover'],
        'headerRowOptions' => ['class' => 'align-middle', 'height' => '75'],
        'pager' => [
            'class' => 'yii\bootstrap5\LinkPager'
        ],
        'layout'=>"{items}\n{pager}",
        'columns' => [
            [
                'class' => 'yii\grid\SerialColumn',
                'options' => ['class' => 'firstColumnInHistory'],
                'header' => '№',
            ],
            [
                'attribute' => 'id',
                'visible' => Yii::$app->user->can('admin'),
                'label' => 'ID',
            ],
            [
                'attribute' => 'username',
                'visible' => Yii::$app->user->can('admin'),
                'label' => 'имя',
                'filter' => false,
            ],
            [
                'attribute' => 'email',
                'visible' => Yii::$app->user->can('admin'),
                'label' => 'E-mail',
                'filter' => false,

            ],
            [
                'attribute' => 'month',
                'label' => 'месяц ' . Html::img('@web/svg/sort.svg'),
                'enableSorting' => true,
                'encodeLabel' => false,
                'filterInputOptions' => [
                    'class' => 'form-label formHistory',
                    ],
            ],
            [
                'attribute' => 'raw_type',
                'label' => 'тип сырья ' . Html::img('@web/svg/sort.svg'),
                'enableSorting' => true,
                'encodeLabel' => false,
                'filterInputOptions' => [
                    'class' => 'form-label formHistory',
                ],

            ],
            [
                'attribute' => 'tonnage',
                'label' => 'тоннаж ' . Html::img('@web/svg/sort.svg'),
                'enableSorting' => true,
                'encodeLabel' => false,
                'filterInputOptions' => [
                    'class' => 'form-label formHistory',
                ],

            ],
            [
                'attribute' => 'price',
                'label' => 'стоимость ' . Html::img('@web/svg/sort.svg'),
                'encodeLabel' => false,
                'enableSorting' => true,
                'filterInputOptions' => [
                    'class' => 'form-label formHistory',
                ],

            ],
            [
                'attribute' => 'created_at',
                'label' => "Создано " . Html::img('@web/svg/sort.svg'),
                'value' => function ($model) {
                    return Yii::$app->formatter->asDatetime($model->created_at, 'php:d.m.Y');
                },
                'filterInputOptions' => [
                    'class' => 'form-label formHistory',
                ],
                'enableSorting' => true,
                'encodeLabel' => false,
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{delete} {view}',
                'buttons' => [
                   'view' => function ($url, $model, $key) {
                        return Html::a(Html::img('@web/svg/view.svg'), ['/history/view', 'id' => $model->id]);
                    },
                    'delete' => function ($url, $model, $key) {
                        return Html::a(Html::img('@web/svg/delete.svg'), $url, [
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


