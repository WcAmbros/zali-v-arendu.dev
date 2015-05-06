<?php
use yii\helpers\Html;
use yii\helpers\Url;
use frontend\assets\AppAsset;
use frontend\widgets\Alert;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>


<body class="page">
<?php $this->beginBody() ?>
<header class="header">

    <div class="header-content">
        <div class="header-content-logo">
            <span class="header-content-logo__label">Залы</span> в аренду
        </div>
        <div class="header-content-town">
            В городе: <span class="header-content-town__label">Санкт-Петербург</span>
            <div class="dropdown">
                <ul class="dropdown-list"></ul>
            </div>
        </div>
        <div class="header-content-user">
            <?php

            $login=Url::toRoute('user/login');
            $logout=Url::toRoute('user/logout');
            $signup=Url::toRoute('user/signup');
            if(Yii::$app->user->isGuest){

                echo '<a href="'.$login.'">Войти</a> / <a href="'.$signup.'">Зарегистрироваться</a>';
            }else{
                echo 'Привет, <a href="#" class="header-content-user__label">'.Yii::$app->user->identity->username.'!</a>
                <img src="/images/user.jpg" class="header-content-user__icon"> /
                <a data-method="post" href="'.$logout.'">Выйти</a>';
            }
            ?>
        </div>
    </div>
</header>
<div class="content">
    <?= $content ?>
    <?= Alert::widget() ?>
</div>
<footer class="footer">
    <div class="footer-content">
        <div class="site-master">
            <img src="/images/style/site-master.png">
        </div>
        <div class="footer-content-nav">
            <a href="#" class="footer-content-nav-link">О проекте</a> |
            <a href="#" class="footer-content-nav-link">Реклама</a> |
            <a href="#" class="footer-content-nav-link">Обратная связь</a>
        </div>
        <div class="footer-social">
            <a href="#" class="i-icons i-vk"></a>
            <a href="#" class="i-icons i-facebook"></a>
        </div>
        <div class="footer-copy">
            &copy; <?= date('Y') ?> <a href="/" class="footer-copy-link">Залы в аренду</a>
        </div>
    </div>
</footer>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

