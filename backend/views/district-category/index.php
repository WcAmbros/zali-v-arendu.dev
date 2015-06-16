<?php

use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\DistrictCategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'District Categories';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="district-category-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create District Category', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
//        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute'=>'name',
                'content'=>function($model){
                    return Html::a($model['name'],['view','id'=>$model['id']]);
                },
            ],
            'id',


            [
                'class' => 'yii\grid\ActionColumn',
                'urlCreator'=>function($action, $model){
                    return [$action,'id'=>$model['id']];
                },
                'template'=>'{update}{delete}'
            ],
        ],
    ]); ?>

</div>
