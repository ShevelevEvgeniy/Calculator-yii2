<?php

/**
 * @var yii\web\View $this
 * @var yii\bootstrap5\ActiveForm $form
 * @var app\models\CalculatorFormForApi $model
 * @var $months
 * @var $raw_types
 * @var $tonnages
 * @var $result_price
 * @var $ListPricesByType
 */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;
use yii\helpers\Url;

$this->title = 'калькулятор расчета стоимости';
?>
<?php if (isset(Yii::$app->request->cookies['alert-success'])):?>
<div class="container notification my-3">
    <div class=" alert alert-success alert-dismissible fade show" role="alert">
        <div>
            Здравствуйте, <?= Yii::$app->user->identity->username ?>, вы авторизовались в системе расчета стоимости доставки.
            Теперь все ваши расчеты будут сохранены для последующего просмотра в <a href="/history/index">журнале расчетов</a>
        </div>
        <button class="btn-close" id='remove-cookie-btn'></button>
    </div>
</div>
<?php endif; ?>
<div class="container my-5 border border-3 border-white shadow rounded-2 bg-white p-3">

    <?php $form = ActiveForm::begin([
        'id' => 'calculator-form',
        'enableAjaxValidation' => true,
        'validationUrl' => Url::to(['/calculator/validate-calculator-form']),
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
            <?= Html::Button('Рассчитать', ['class' => 'btn buttonCalculator']); ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>
</div>
    <div class="container my-5 rounded-2 shadow bg-white" id = 'table'></div>
<?php
$script = <<< JS

    $('#remove-cookie-btn').on('click', function() {
        $.ajax({
            url: '/calculator/remove-cookie',
            type: 'GET',
            success: function() {
                $(".notification").hide();
            }
        });
    });

    $('.buttonCalculator').on('click', function () {
        var data = $('#calculator-form').serialize();
        $.ajax({
            url: "/calculator/index",
            data: data,
            type: 'POST',
            success: function (response) {
                    $("#table").html(response)
            }
        })
        return false;
    })

JS;
$this->registerJs($script);
?>