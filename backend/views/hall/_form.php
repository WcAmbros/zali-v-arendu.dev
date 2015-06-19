<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Hall */
/* @var $options array */
/* @var $event yii\base\ModelEvent */

/* @var $form yii\widgets\ActiveForm */

?>

<div class="hall-form">
    <?php $form = ActiveForm::begin(); ?>
    <div>
        <div>Адрес</div>
        <?= $form->field($model->address, 'town')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model->address, 'district')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model->address, 'metro')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model->address, 'house')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model->address, 'block')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model->address, 'comment')->textarea(['rows' => 6]) ?>
    </div>
    <div>
        <div>Зала</div>
        <?= $form->field($model, 'comments')->textarea(['rows' => 6]) ?>
        <?= $form->field($model, 'square')->textInput() ?>
        <div>
            <div>Цены</div>
            <?= $form->field($model->price, 'min')->textInput() ?>
            <?= $form->field($model->price, 'max')->textInput() ?>
        </div>
        <div>
            <div>Опции зала</div>
            <?php
                $list=ArrayHelper::map($options,'id','name');
                ?>
                    <?= $form->field($model,'options')->checkboxList($list); ?>
                <?php

            ?>
        </div>
    </div>
    <div>
        <div>Контакты</div>
        <?= $form->field($model->contacts, 'name')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model->contacts, 'email')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model->contacts, 'phone')->textInput(['maxlength' => true]) ?>
    </div>


    <?=$this->render('_attribs',['attribs'=>$model->attribs])?>

    <?= $form->field($model, 'favourite')->textInput() ?>

<!--    --><?//= $form->field($model, 'floor_id')->hiddenInput()?>
<!---->
<!--    --><?//= $form->field($model, 'price_id')->hiddenInput() ?>
<!---->
<!--    --><?//= $form->field($model, 'address_id')->hiddenInput() ?>
<!---->
<!--    --><?//= $form->field($model, 'category_id')->hiddenInput() ?>
<!---->
<!--    --><?//= $form->field($model, 'contacts_id')->hiddenInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
