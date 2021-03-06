<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Hall */
/* @var $params array */

$this->title = 'Обновить: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Залы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $model->name;

?>
<div class="hall-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', array_merge(['model' => $model,],$params)) ?>

</div>
