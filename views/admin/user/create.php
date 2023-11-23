<?php
/**
 * @var $model
 */

use app\models\UserUpdateForm;
use yii\bootstrap5\ActiveForm;
use yii\helpers\Url;
use yii\bootstrap5\Html;

$this->title = 'История расчетов';
?>
<div class="container my-5 border border-3 border-white shadow rounded-2 bg-white p-3">
    <?php $form = ActiveForm::begin([
            'id' => 'update-form',
            'layout' => 'horizontal',
            'enableAjaxValidation' => true,
            'validationUrl' => Url::to(['/user/validation-signup-form']),
            'fieldConfig' => [
                'horizontalCssClasses' => [
                    'label' => 'col-sm-3',
                    'offset' => 'col-sm-offset-4',
                    'wrapper' => 'col-sm-9',
                    'error' => '',
                    'hint' => '',
                ],
                'inputOptions' => [
                    'class' => 'form-control',
                ],
                'template' => "{label}\n{beginWrapper}\n{input}\n{hint}\n{error}\n{endWrapper}",
            ]]
    ); ?>

    <div class="row pt-2 px-2 pb-3">
        <h5>Создание аккаунта</h5>
    </div>

    <div class="row gap-5 px-3 label">

        <div>
            <?= $form->field($model, 'username')->textInput(); ?>
        </div>

        <div>
            <?= $form->field($model, 'email')->input('email'); ?>
        </div>

        <div>
            <?= $form->field($model, 'password')->passwordInput(); ?>
        </div>

        <div>
            <?= $form->field($model, 'password_repeat')->passwordInput(); ?>
        </div>


    </div>

    <div class="form-group row pt-3 px-3">
        <div class = 'col-4 p-0'>
            <?= Html::submitButton('Создать', ['class' => 'btn btn-create']); ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>
</div>