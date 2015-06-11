<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\DistrictCategory */

$this->title = 'Create District Category';
$this->params['breadcrumbs'][] = ['label' => 'District Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="district-category-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
