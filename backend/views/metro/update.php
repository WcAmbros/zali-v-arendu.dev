<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Metro */

$this->title = 'Обновить: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Метро', 'url' => ['index']];
$this->params['breadcrumbs'][] = $model->name;
?>
<div class="metro-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
