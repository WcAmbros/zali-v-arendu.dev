<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\HallSearch */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="hall-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options'=>['class'=>'']
    ]); ?>




    <div class="container-fluid">
        <div class="form-group form-inline row">
            <?= $form->field($model, 'id',[
                'options'=>['class'=>'form-group input-group  col-md-1'],
                'labelOptions'=>['class'=>'input-group-addon'],
            ]) ?>

            <div class="form-group field-hallsearch-status input-group col-md-3">

                <label class="control-label  input-group-addon" for="hallsearch-status">Статус</label>
                <select class="form-control" id="hallsearch-status" name="HallSearch[status]">
                    <option value="">Не выбран</option>
                    <?= Html::renderSelectOptions($model->status, $model->getStatusesArray()); ?>
                </select>
            </div>
        </div>
    </div>
    <?= $form->field($model, 'name',[
        'options'=>['class'=>'form-group input-group'],
        'labelOptions'=>['class'=>'input-group-addon'],
    ])->label('Поиск по фразе') ?>




    <div class="form-group">
        <?= Html::submitButton('Найти', ['class' => 'btn btn-primary']) ?>
<!--        --><?//= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
