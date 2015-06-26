<?php

use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\DistrictSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Districts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="district-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create District', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn',
                'filterOptions'=>['class'=>'col-sm-1']
            ],
            [
                'attribute'=>'name',
                'content'=>function($model){
                    return Html::a($model['name'],['update','id'=>$model['id']]);
                },
            ],
            [
                'attribute'=>'category.name',
                'label'=>'Категория',
                'filterOptions'=>['class'=>'col-sm-3']
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
