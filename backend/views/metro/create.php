<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Metro */

$this->title = 'Создать';
$this->params['breadcrumbs'][] = ['label' => 'Метро', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="metro-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
