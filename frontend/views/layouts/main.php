<?php
use frontend\assets\AppAsset;
use frontend\widgets\Alert;
use yii\helpers\Html;
use yii\helpers\Url;

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
            <a class="header-content-logo-link" href="/"><span class="header-content-logo-link__label">Залы</span> в
                аренду</a>
        </div>
        <div class="header-content-town">
            <?php
            echo $this->render('_region');
            ?>
        </div>
        <div class="header-content-user">
            <?php
            echo $this->render('_user_menu');
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
            <a class="site-master-link" href="http://site-spb.ru/"><img src="/template/site/images/style/site-master.png"><span>Создание и поддержка</span></a>
        </div>
        <div class="footer-content-nav">
            <a href="<?= (Url::toRoute('site/about')) ?>" class="footer-content-nav-link">О проекте</a> |
            <a href="<?= (Url::toRoute('site/banner')) ?>" class="footer-content-nav-link">Реклама</a> |
            <a href="<?= (Url::toRoute('site/contact')) ?>" class="footer-content-nav-link">Обратная связь</a>
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


