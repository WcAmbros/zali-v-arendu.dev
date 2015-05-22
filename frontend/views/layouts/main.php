<?php
use yii\helpers\Html;
use yii\helpers\Url;
use frontend\assets\AppAsset;
use frontend\widgets\Alert;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);

if(!Yii::$app->user->isGuest){
    $route='/agent';
    $username=Yii::$app->user->identity->username;
    $icon='';
    $agent=Yii::$app->agent->findOne(['user_id'=>Yii::$app->user->id]);
    if(!is_null($agent)){
        $route='/agent/'.$agent->id;
        $username=$agent->name;
        $icon='<img src="/'.$agent->images.'" class="header-content-user__icon">';
    }

}

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

                echo 'Привет, <a href="'.$route.'" class="header-content-user__label">'.$username.'!</a>
                '.$icon.' /
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
            <a href="/about" class="footer-content-nav-link">О проекте</a> |
            <a href="/banner" class="footer-content-nav-link">Реклама</a> |
            <a href="/contact" class="footer-content-nav-link">Обратная связь</a>
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


