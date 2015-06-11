<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Hall */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Halls', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hall-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id, 'floor_id' => $model->floor_id, 'price_id' => $model->price_id, 'address_id' => $model->address_id, 'category_id' => $model->category_id, 'contacts_id' => $model->contacts_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id, 'floor_id' => $model->floor_id, 'price_id' => $model->price_id, 'address_id' => $model->address_id, 'category_id' => $model->category_id, 'contacts_id' => $model->contacts_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'attribs:ntext',
            'square',
            'favourite',
            'comments:ntext',
            'created_at',
            'updated_at',
            'public',
            'deleted',
            'floor_id',
            'price_id',
            'address_id',
            'category_id',
            'contacts_id',
        ],
    ]) ?>

</div>
