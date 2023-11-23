<?php
use yii\helpers\Html;
use yii\widgets\DetailView;
/**
 * @var $model
 */
$this->title = 'Профиль';
?>
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
                            <?= Html::beginForm(['user/logout']) . Html::submitButton('Выход', ['class' => 'btn btn-danger']) . Html::endForm() ?>
                    </div>
                </div>
            </div>

                <div class="col-lg-8">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0 dataName">Имя</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0 dataUser"><?= $model->username ?></p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0 dataName">E-mail</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0 dataUser"><?= $model->email ?></p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0 dataName">ID</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0 dataUser"><?= $model->id ?></p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0 dataName">Дата регистрации</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0 dataUser"><?= $model->created_at ?></p>
                                </div>
                            </div>
                            <hr>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>