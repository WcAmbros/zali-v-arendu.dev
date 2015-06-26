<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $event yii\base\ModelEvent
 *
 * @var \common\models\Hall $model
 * @var \common\models\Floor[] $floor
 * @var \common\models\Category[] $category
 * @var \common\models\Options[] $options
 * @var \common\models\Metro[] $metro
 * @var \common\models\District[] $district
 * @var \common\models\Town[] $town
 */


/* @var $form yii\widgets\ActiveForm */

?>

<div class="hall-form">
    <?php $form = ActiveForm::begin(); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <ul id="hall-tab" class="nav nav-tabs">
        <li class="active"><a href="#tab-common">Общая</a></li>
        <li><a href="#tab-contacts">Контакты</a></li>
        <li><a href="#tab-album">Альбом</a></li>
    </ul>
    <div class="tab-content">

        <div id="tab-common" class="tab-pane fade active in">
            <h3>Общая</h3>
                <div>
                    <div class="form-group input-group col-md-3">
                        <label class="control-label  input-group-addon" for="hall-status">Статус</label>
                        <select class="form-control" id="hall-status" name="Address[town]">
                            <?= Html::renderSelectOptions($model->status, $model->getStatusesArray()); ?>
                        </select>
                    </div>
                    <?= $form->field($model, 'status',['template' => "{hint}\n{error}",]) ?>
                </div>

                <?= $form->field($model, 'favourite',[
                    'options'=>['class'=>'form-group input-group col-md-3 '],
                    'labelOptions'=>['class'=>'control-label input-group-addon']])->textInput()?>

                <fieldset>
                    <legend>Адрес</legend>
                    <div class="form-group">
                        <div>
                            <div class="input-group col-md-3">
                                <label class="control-label  input-group-addon" for="address-town">Город</label>
                                <select class="form-control" id="address-town" name="Address[town]">
                                    <option value="">Не выбран</option>
                                    <?= Html::renderSelectOptions(($model->isNewRecord) ? "" : $model->address->town, ArrayHelper::map($town, 'name', 'name')); ?>
                                </select>
                            </div>
                            <?=$form->field($model->address,'town',['template' => "{hint}\n{error}",])?>
                        </div>
                        <div>
                            <div  class="input-group col-md-3">
                                <label class="control-label  input-group-addon" for="address-district">Район</label>
                                <select  class="form-control" id="address-district" name="Address[district]">
                                    <option value="">Не выбран</option>
                                    <?= Html::renderSelectOptions(($model->isNewRecord) ? "" : $model->address->district, ArrayHelper::map($district, 'name', 'name')); ?>
                                </select>
                            </div>
                            <?=$form->field($model->address,'district',['template' => "{hint}\n{error}",])?>
                        </div>
                        <div class=" input-group col-md-3">
                            <label class="control-label  input-group-addon" for="address-metro">Метро</label>
                            <select class="form-control" id="address-metro" name="Address[metro]">
                                <option value="">Не выбран</option>
                                <?= Html::renderSelectOptions(($model->isNewRecord) ? "" : $model->address->metro, ArrayHelper::map($metro, 'name', 'name')); ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group  input-group">
                        <?= $form->field($model->address, 'house',[
                                'options'=>['class'=>'col-md-3'],
                                'labelOptions'=>['class'=>'control-label']]
                        )->textInput(['maxlength' => true]) ?>

                        <?= $form->field($model->address, 'block',[
                            'options'=>['class'=>'col-md-3'],
                            'labelOptions'=>['class'=>'control-label']])->textInput(['maxlength' => true]) ?>
                    </div>
                    <?= $form->field($model->address, 'comment',[
                        'options'=>['class'=>'form-group input-group col-md-5 '],
                        'labelOptions'=>['class'=>'control-label']])->textarea(['rows' => 6]) ?>

                </fieldset>
                <fieldset>
                    <legend>Стоимость зала</legend>
                    <div class="form-group  input-group">
                        <?= $form->field($model->price, 'min',[
                            'options'=>['class'=>'col-md-3'],
                            'labelOptions'=>['class'=>'control-label']])->textInput() ?>

                        <?= $form->field($model->price, 'max',[
                            'options'=>['class'=>'col-md-3'],
                            'labelOptions'=>['class'=>'control-label']])->textInput() ?>
                    </div>
                </fieldset>
                <fieldset>
                    <legend>Параметры Зала</legend>
                    <div class="form-group  input-group col-md-3">
                        <label class="control-label  input-group-addon" for="hall-floor">Покрытие:</label>
                        <select class="form-control" id="hall-floor" name="Hall[floor_id]">
                            <?= Html::renderSelectOptions($model->floor_id, ArrayHelper::map($floor, 'id', 'name')); ?>
                        </select>
                    </div>
                    <?= $form->field($model, 'square',[
                        'options'=>['class'=>'form-group input-group col-md-2 '],
                        'labelOptions'=>['class'=>'control-label input-group-addon']])->textInput() ?>


                    <?= $form->field($model, 'comments',[
                        'options'=>['class'=>'form-group input-group col-md-5 '],
                        'labelOptions'=>['class'=>'control-label']])->textarea(['rows' => 6]) ?>

                </fieldset>
                <fieldset>
                    <legend>Опции зала</legend>
                    <div class="form-group  input-group col-md-3">
                        <label class="control-label  input-group-addon" for="hall-category">Назначение:</label>
                        <select class="form-control" id="hall-category" name="Hall[category_id]">
                            <?= Html::renderSelectOptions($model->category_id, ArrayHelper::map($category, 'id', 'name')); ?>
                        </select>
                    </div>
                    <div>
                        <?php
                        $list=ArrayHelper::map($options,'id','name');
                        ?>
                        <?= $form->field($model,'options')->label(false)->checkboxList($list); ?>
                    </div>
                </fieldset>
        </div>

        <div id="tab-contacts" class="tab-pane fade ">
            <h3>Контакты</h3>
                <?= $form->field($model->contacts, 'name',[
                    'options'=>['class'=>'form-group input-group col-md-3 '],
                    'labelOptions'=>['class'=>'control-label input-group-addon']])->textInput(['maxlength' => true]) ?>
                <?= $form->field($model->contacts, 'email',[
                    'options'=>['class'=>'form-group input-group col-md-3 '],
                    'labelOptions'=>['class'=>'control-label input-group-addon']])->textInput(['maxlength' => true]) ?>
                <?= $form->field($model->contacts, 'phone',[
                    'options'=>['class'=>'form-group input-group col-md-3 '],
                    'labelOptions'=>['class'=>'control-label input-group-addon']])->textInput(['maxlength' => true]) ?>

        </div>
        <div id="tab-album" class="tab-pane fade ">
            <h3>Альбом</h3>
                <div class="form-group">
                    <?=$this->render('_attribs',['attribs'=>$model->attribs])?>
                </div>
        </div>
    </div>
    <?php ActiveForm::end(); ?>

</div>
