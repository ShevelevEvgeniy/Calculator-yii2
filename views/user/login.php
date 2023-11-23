<?php
/**
 * @var $login_model
 */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;


$this->title = 'регистрация';
?>

<div class="container-fluid">
    <?php

    $form = ActiveForm::begin([
        'id' => 'login-form',
        'enableClientValidation' => true,
        'options' => ['class' => 'mx-auto'],
    ]);
    ?>

    <h4 class="text-center mt-3">Авторизация</h4>
    <div class="md-3 mt-5">
        <?= $form->field($login_model, 'email')->input('email'); ?>
    </div>
    <div class="md-3">
        <?= $form->field($login_model, 'password')->passwordInput(); ?>
    </div>
    <div class="md-3">
        <?= Html::submitButton('Войти', ['class' => 'btn btn-primary mt-4']); ?>
    </div>
    <div class="text-center mt-2 hrefLogin">
        <div>Еще нет аккаунт?</div>
        <a href="/user/signup"">Создать</a>
    </div>

    <?php ActiveForm::end(); ?>
</div>


