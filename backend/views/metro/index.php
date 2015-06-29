<?php

use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\MetroSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Метро';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="metro-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Создать', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn',
                'filterOptions'=>['class'=>'col-sm-1']],

            [
                'attribute'=>'name',
                'content'=>function($model){
                    return Html::a($model['name'],['update','id'=>$model['id']]);
                },
            ],
            [
                'attribute'=>'id',
                'filterOptions'=>['class'=>'col-sm-1']
            ],


            [
                'class' => 'yii\grid\ActionColumn',
                'urlCreator'=>function($action, $model){
                    return [$action,'id'=>$model['id']];
                },
                'template'=>'{delete}',
                'filterOptions'=>['class'=>'col-sm-1']
            ],
        ],
    ]); ?>

</div>
