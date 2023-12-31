<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;

AppAsset::register($this);

$this->registerCsrfMetaTags();
$this->registerMetaTag(['charset' => Yii::$app->charset], 'charset');
$this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no']);
$this->registerMetaTag(['name' => 'description', 'content' => $this->params['meta_description'] ?? '']);
$this->registerMetaTag(['name' => 'keywords', 'content' => $this->params['meta_keywords'] ?? '']);
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/x-icon', 'href' => Yii::getAlias('@web/favicon.ico')]);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<?php $this->beginBody() ?>
<body class="d-flex flex-column h-100 bg-light">

<header id="header">
    <?php
    NavBar::begin([
        'brandLabel' => '<img src="/img/logo.png" alt="">',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-expand-md border-3 border-white rounded-2 shadow'
        ],
        'containerOptions' => [
            'class' => 'justify-content-end'
        ],
    ]);
        echo Nav::widget([
            'options' => ['class' => 'navbar-nav'],
            'items' => [
                ['label' => 'Расчет доставки', 'url' => Yii::$app->homeUrl],
                ['label' => 'вход', 'url' => ['/user/login'], 'visible' => Yii::$app->user->isGuest],
                ['label' => Yii::$app->user->identity->username, 'items' => [
                        ['label' => 'Профиль', 'url' => ['/user/profile', 'id' => Yii::$app->user->id], 'linkOptions' => ['class' => 'border-bottom border-1']],
                        ['label' => 'История расчетов' , 'url' => ['/history/index'], 'linkOptions' => ['class' => 'border-bottom border-1']],
                        ['label' => 'Пользователи', 'url' => ['/admin/user'], 'linkOptions' => ['class' => 'border-bottom border-1'],
                            'visible' => Yii::$app->user->can('admin')],
                        ['label' => 'Swagger', 'options' => ['class' => 'text-danger'], 'url' => ['/swagger-ui/index'],
                            'visible' => Yii::$app->user->can('admin')],
                        ['label' => 'Выход', 'options' => ['class' => 'text-danger'], 'url' => ['/user/logout']],
                    ],
                    'visible' => !Yii::$app->user->isGuest,
                    'dropdownOptions' => ['class' => 'dropdownMain'],
                ],
            ],
        ]);
    NavBar::end();

    ?>
</header>

<main id="main" role="main">
    <?= $content ?>
</main>

<footer id="footer" class="mt-auto py-3 bg-white border-3 border-white rounded-2 shadow">
    <div class="container">
        <div class="row footerText">
            <a class="logo" href=""> </a>
            <div class="col-md-6 text-center text-md-start">&copy; ЭФКО стартер-0.0.6 </div>
            <div class="col-md-6 text-center text-md-end text-dark">2023</div>
        </div>
    </div>
</footer>



<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>


