<?php

use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\HallSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Halls';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hall-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Hall', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'attribs:ntext',
            'square',
            'favourite',
            // 'comments:ntext',
            // 'created_at',
            // 'updated_at',
            // 'public',
            // 'deleted',
            // 'floor_id',
            // 'price_id',
            // 'address_id',
            // 'category_id',
            // 'contacts_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
