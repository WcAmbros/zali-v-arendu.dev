<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\DistrictCategory */

$this->title = 'Update District Category: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'District Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="district-category-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
