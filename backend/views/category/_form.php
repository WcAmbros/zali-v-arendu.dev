<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Category */
/* @var $options common\models\Options[] */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="category-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'alias')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Сохранить' : 'Обновить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <div>
        <div>Опции категории</div>
        <?php
            $category_options=json_decode($model->options,true);
        foreach($options as $option){
            echo "<div>".
                Html::checkbox('Options[]',
                    ((!is_null($category_options)&&in_array($option->id,$category_options))?true:false),
                    [
                        'label'=>$option->name,
                        'value'=>$option->id
                    ]
                )
                ."</div>";
        }
        ?>
        <?php

        ?>
    </div>
    <?php ActiveForm::end(); ?>

</div>
