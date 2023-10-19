<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var app\models\CalculatorForm $model */

/** @var $prices */
/** @var $result */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

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
                    array_combine(array_keys($prices['шрот'][25]), array_keys($prices['шрот'][25])),
                    ['prompt' => 'Выберите удобный вам месяц'],
                ); ?>
            </div>

            <div class="col p-3">
                <?= $form->field($model, 'type')->dropDownList(
                    array_combine(array_keys($prices), array_keys($prices)),
                    ['prompt' => 'Укажите материал сырья']
                ); ?>
            </div>

            <div class="col p-3">
                <?= $form->field($model, 'tonnage')->dropDownList(
                    array_combine(array_keys($prices['шрот']), array_keys($prices['шрот'])),
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
            <h6 class="pt-3 pb-4">Таблица стоимости доставки для материала <?=$model->type?></h6>
            <table class="table table-hover" >
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
                    <?php
                    foreach ($prices[$model->type][25] as $key => $value){
                        echo '<th class="text-center align-top">' . $key . '</th>';
                    }
                    ?>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($prices[$model->type] as $key => $value){
                    echo "<tr><th scope='row' class='align-middle tableTonnage'>" . $key . "</th>";
                    foreach ($prices[$model->type][$key] as $key2 => $value2){
                        echo "<th class='text-center'><div class='my-1 tableValue'>" . $value2 . "</div></th>";
                    }
                    echo "</tr>";
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
<?php endif; ?>


