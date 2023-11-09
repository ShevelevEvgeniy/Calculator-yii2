<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var app\models\CalculatorFormForApi $model */

/** @var $months */
/** @var $raw_types */
/** @var $tonnages */
/** @var $result */

use app\models\Prices;
use app\models\RawTypes;
use app\models\Repository;
use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;
use yii\db\Query;

$this->title = 'Calculator';
?>


<div class="container my-5 border border-3 border-white shadow rounded-2 bg-white p-3">

    <?php $form = ActiveForm::begin(['id' => 'calculator-form', 'enableClientValidation' => true,
            'fieldConfig' => [
                'options' => ['class' => 'row'],
                'inputOptions' => [
                    'class' => 'form-select',
                ],
                'template' => "{input}{error}",
            ]]
    ); ?>

    <div class="row pt-2 px-2">
        <h5>Калькулятор стоимости доставки сырья</h5>
    </div>

    <div class="row gap-5 px-3 label">

        <div class="col p-3">
            <?= $form->field($model, 'month')->dropDownList(
                array_combine(array_values($months), array_values($months)),
                ['prompt' => 'Выберите удобный вам месяц']
            ); ?>
        </div>

        <div class="col p-3">
            <?= $form->field($model, 'raw_type')->dropDownList(
                array_combine(array_values($raw_types), array_values($raw_types)),
                ['prompt' => 'Укажите материал сырья']
            ); ?>
        </div>

        <div class="col p-3">
            <?= $form->field($model, 'tonnage')->dropDownList(
                array_combine(array_values($tonnages), array_values($tonnages)),
                ['prompt' => 'Выберите тоннаж']
            ); ?>
        </div>

    </div>

    <div class="form-group row pt-3 px-3">
        <div class = 'col-4 p-0'>
            <?= Html::submitButton('Рассчитать', ['class' => 'btn buttonCalculator']); ?>
        </div>

        <div class = 'col d-flex align-items-center results'>
            <?php
            echo $result;
            ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>
</div>
<?php if ($model->load(YII::$app->request->post())): ?>
    <div class="container my-5 rounded-2 shadow bg-white" id = 'table'>
        <div class="container p-3">
            <h6 class="pt-3 pb-4">Таблица стоимости доставки для материала <?= $model->raw_type ?></h6>
            <table class="table table-hover">
                <thead>
                <tr>
                    <th class="tableHeader">
                        <div class="container-fluid">

                            <div class="row justify-content-end">
                                Месяц
                            </div>

                            <div class="row">
                                Тоннаж
                            </div>

                        </div>
                    </th>
                    <?
                    $months = [];
                    $tableRows = [];

                    foreach (Repository::getListPricesByType($model->raw_type) as $month => $item) {
                        $months[] = "<th class='text-center align-top'>  " . $month . "  </th>";
                        foreach ($item as $tonnage => $price) {
                            $tableRows['<th scope="row" class="align-middle tableTonnage">' . $tonnage . '</th>'][] =
                                '<td class="text-center"><div class="my-1 tableValue">' . $price . '</div></td>';
                        }
                    }
                    ?>
                    <?= join('', $months) ?>
                </tr>
                </thead>
                <tbody>

                <?php foreach ($tableRows as $tonnage => $prices): ?>
                    <tr>
                        <?= $tonnage ?>
                        <?= join('', $prices) ?>
                    </tr>
                <?php endforeach; ?>

                </tbody>
            </table>
        </div>
    </div>
<?php endif; ?>