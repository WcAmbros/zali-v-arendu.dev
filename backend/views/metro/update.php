<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Metro */

$this->title = 'Update Metro: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Metros', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id, 'district_id' => $model->district_id, 'district_town_id' => $model->district_town_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="metro-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
