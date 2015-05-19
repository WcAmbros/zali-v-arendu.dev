<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

$this->title = Html::encode($message);
?>
<div class="site-error">

    <h1><?= Html::encode($message) ?> (404)</h1>

    <div style="text-align: center">
        <img src="/images/404.jpg">
    </div>
</div>
