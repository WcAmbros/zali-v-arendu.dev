<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Agent */

$this->title = 'Профиль пользователя';

?>
<div class="agent-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
