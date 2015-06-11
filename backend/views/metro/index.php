<?php

use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\MetroSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Metros';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="metro-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Metro', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'attribs:ntext',
            'district_id',
            'district_town_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
