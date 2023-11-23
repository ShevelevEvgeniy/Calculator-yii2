<?php

/** @var yii\bootstrap5\ActiveForm $form */
/** @var  UserUpdateForm $model */

use app\models\UserUpdateForm;
use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;
use yii\helpers\Url;

$this->title = 'Профиль';
?>

<div class="update">
    <?php $form = ActiveForm::begin([
        'layout' => 'horizontal',
        'id' => 'update-form',
        'enableAjaxValidation' => true,
        'validationUrl' => Url::to(['/administrator/validate-user-update-form', 'id' => $model->id]),
        'fieldConfig' => [
            'template' => "{label}\n{beginWrapper}\n{input}\n{hint}\n{error}\n{endWrapper}",
            'horizontalCssClasses' => [
                'label' => 'col-sm-3 dataName',
                'wrapper' => 'col-sm-9',
            ],
        ]]); ?>
    <div class="container my-5">
        <div class="container py-4">
            <div class="row">

                <div class="col-lg-4">
                    <div class="card mb-4">
                        <div class="card-body text-center">
                            <img src="/img/account.png"
                                 class="rounded-circle img-fluid" style="width: 150px;">
                            <h5 class="mt-3 mb-5"><?= $model->username ?></h5>
                            <?= Html::a('Журнал расчётов', ['history/index'], ['class' => 'btn btn-primary mb-2']) ?>
                            <?= Html::a('Пользователи', ['/admin/user'] , ['class' => 'btn btn-danger']) ?>
                        </div>
                    </div>
                </div>

                <div class="col-lg-8">
                    <div class="card mb-4">
                        <div class="card-body">
                            <?= $form->field($model, 'id')->textInput([
                                'readonly' => true, 'class' => 'form-control-plaintext'
                            ]) ?>
                            <hr>
                            <?= $form->field($model, 'username')->textInput(['class' => 'form-control dataUser', 'autofocus' => false]) ?>

                            <hr>
                            <?= $form->field($model, 'email')->textInput(['class' => 'form-control dataUser', 'autofocus' => false]) ?>
                            <hr>
                            <div class = 'col-sm-9'>
                                <?= Html::submitButton('Обновить данные', ['class' => 'btn btn-update']); ?>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <?php $form = ActiveForm::end() ?>
    </div>
</div>

