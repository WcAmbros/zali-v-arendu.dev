<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Hall */

$this->title = 'Update Hall: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Halls', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id, 'floor_id' => $model->floor_id, 'price_id' => $model->price_id, 'address_id' => $model->address_id, 'category_id' => $model->category_id, 'contacts_id' => $model->contacts_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="hall-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
