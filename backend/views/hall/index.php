<?php

use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\HallSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var  \common\models\Hall $model*/

$this->title = 'Halls';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="hall-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php  echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Hall', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php \yii\widgets\Pjax::begin(); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'filterRowOptions'=>[
            'class'=>'hall-search'
        ],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute'=>'name',
                'content'=>function($model){
                    return Html::a($model['name'],['update','id'=>$model['id']]);
                },
            ],
            [
                'attribute'=>'category.name',
                'label'=>'Категория'
            ],
            [
                'attribute'=>'address.town',
                'label'=>'Город',
            ],
            [
                'attribute'=>'user.username',
                'label'=>'Пользователь',
            ],
            [
                'attribute'=>'status',
                'label'=>'Статус',
                'filterOptions'=>['class'=>'hall_status'],
                'content'=>function($model){
                    /* @var  \common\models\Hall $model*/
                    $icons=[
                      $model::STATUS_UNPUBPLIC=>'glyphicon-remove',
                      $model::STATUS_PUBPLIC=>'glyphicon-ok',
                      $model::STATUS_WAIT=>'glyphicon-pencil',
                      $model::STATUS_DELETED=>'glyphicon-trash',
                    ];
                    return "<span class='icon-status glyphicon {$icons[$model->status]}' title='{$model->getStatusName()}'></span>";
                },
            ],
            'id',
            [
                'class' => 'yii\grid\ActionColumn',
                'urlCreator'=>function($action, $model){
                    return [$action,'id'=>$model['id']];
                },
                'template'=>'{delete}'
            ],
        ],
    ]); ?>
    <?php \yii\widgets\Pjax::end(); ?>
</div>
