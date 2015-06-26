<?php

use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create User', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn',
                'filterOptions'=>['class'=>'col-sm-1']],

            [
                'attribute'=>'username',
                'content'=>function($model){
                    return Html::a($model['username'],['update','id'=>$model['id']]);
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
