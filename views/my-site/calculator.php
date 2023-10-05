<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var app\models\CalculatorForm $model */

$this->title = 'Calculator';
?>
<div class="container my-5 border border-3 border-white rounded-2 shadow bg-white">
    <div class="container p-3" id ="containerCalculator">
        <?php $form = ActiveForm::begin([
            'fieldConfig' => [
                'options' => ['class' => 'row'],
                'inputOptions' => [
                    'class' => 'form-select',
                ],
                'template' => "{input}",
            ],
        ]);?>
            <div id='contentText' class="row pb-1">
                <h5 class="pt-3">Калькулятор расчета стоимости доставки</h5>
            </div>
            <div id='contentText' class="row">
                <div id = 'labelsCalculator' class="col p-3">
                    <?=
                    $form->field($model, 'month_id')
                        ->dropDownList(
                            $model->months,
                            ['prompt' => 'Выберите удобный вам месяц'],
                        );
                    ?>
                </div>
                <div id = 'labelsCalculator' class="col p-3">
                    <?=
                    $form->field($model, 'material_id', )
                        ->dropDownList(
                            $model->materials,
                            ['prompt' => 'Укажите материал сырья']
                        );
                    ?>
                </div>
                <div id = 'labelsCalculator' class="col p-3">
                    <?=
                    $form->field($model, 'tonnage_id')
                        ->dropDownList(
                            $model->tonnages,
                            ['prompt' => 'Выберите тоннаж']
                        );
                    ?>
                </div>
            </div>

            <div class="form-group row pt-3">
                <div class = 'col-4 p-0'>
                <?= Html::submitButton('Рассчитать', ['class' => 'btn', 'id' => 'buttonCalculator']); ?>
                </div>

                <div class = 'col d-flex align-items-end' id = 'result'>
                    <?= $result; ?>
                </div>
            </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>

