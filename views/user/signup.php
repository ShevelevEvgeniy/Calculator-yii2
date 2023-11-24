<?php
/**
 * @var $signup_model
 */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;
use yii\helpers\Url;


$this->title = 'регистрация';
?>
<div class="container-fluid">
    <?php

        $form = ActiveForm::begin([
            'id' => 'signup-form',
            'enableAjaxValidation' => true,
            'validationUrl' => Url::to(['/user/validation-signup-form']),
            'options' => ['class' => 'mx-auto'],

        ]);
    ?>
    <h4 class="text-center mt-3">Регистрация</h4>
    <div class="md-3 mt-5">
        <?= $form->field($signup_model, 'username')->textInput(); ?>
    </div>
    <div class="md-3">
        <?= $form->field($signup_model, 'email')->input('email'); ?>
    </div>
    <div class="md-3">
        <?= $form->field($signup_model, 'password')->passwordInput(); ?>
    </div>
    <div class="md-3">
        <?= $form->field($signup_model, 'password_repeat')->passwordInput(); ?>
    </div>
    <div class="md-3">
        <?= Html::submitButton('Регистрация', ['class' => 'btn btn-primary-log mt-4']); ?>
    </div>
    <div class="text-center mt-2 hrefLogin">
        <div>Уже есть аккаунт?</div>
        <a href="/user/login"">Войти</a>
    </div>

    <?php ActiveForm::end(); ?>
</div>
f