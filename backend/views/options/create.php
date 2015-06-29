<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Options */

$this->title = 'Создать';
$this->params['breadcrumbs'][] = ['label' => 'Опции зала', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="options-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
