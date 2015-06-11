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
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute'=>'name',
                'content'=>function($model){
                    return Html::a($model['name'],['view','id'=>$model['id']]);
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
            ],
//            'attribs:ntext',
//            'square',
//            'favourite',
            // 'comments:ntext',
            // 'created_at',
            // 'updated_at',
//             'public',
//             'deleted',
            // 'floor_id',
            // 'price_id',
            // 'address_id',
            // 'category_id',
            // 'contacts_id',
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
