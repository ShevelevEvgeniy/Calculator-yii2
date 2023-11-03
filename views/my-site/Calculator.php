<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var app\models\CalculatorForm $model */

/** @var $months */
/** @var $raw_types */
/** @var $tonnages */
/** @var $result */

use app\models\Prices;
use app\models\RawTypes;
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
            <?= $form->field($model, 'month_id')->dropDownList(
                $months,
                ['prompt' => 'Выберите удобный вам месяц'],
            ); ?>
        </div>

        <div class="col p-3">
            <?= $form->field($model, 'raw_type_id')->dropDownList(
                $raw_types,
                ['prompt' => 'Укажите материал сырья']
            ); ?>
        </div>

        <div class="col p-3">
            <?= $form->field($model, 'tonnage_id')->dropDownList(
                $tonnages,
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
            echo Html::tag('div', "Стоимость составит - " .
                $result,
                ['class' => 'col'],
            );
            ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>
</div>
<?php if ($model->load(YII::$app->request->post())): ?>
    <div class="container my-5 rounded-2 shadow bg-white" id = 'table'>
        <div class="container p-3">
            <h6 class="pt-3 pb-4">Таблица стоимости доставки для материала <?= RawTypes::findById($model->raw_type_id) ?></h6>
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
                    foreach ($months as $key => $value){
                        echo '<th class="text-center align-top">' . $value . '</th>';
                    }
                    ?>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($tonnages as $key => $value){
                    echo "<tr><th scope='row' class='align-middle tableTonnage'>" . $value . "</th>";
                    foreach (Prices::find()->select('price')->where(
                        [
                            'raw_type_id' => $model->raw_type_id,
                            'tonnage_id' => $key,
                        ]
                        )->asArray()->all() as $key2 => $value2){
                        echo "<th class='text-center'><div class='my-1 tableValue'>" . $value2['price'] . "</div></th>";
                    }
                    echo "</tr>";
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
<?php endif; ?>
