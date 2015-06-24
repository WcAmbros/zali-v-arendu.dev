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
    <div>
        <div>
            <label for="hall-status">Статус</label>
            <select id="hall-status" name="Address[town]">
                <?= Html::renderSelectOptions($model->status, $model->getStatusesArray()); ?>
            </select>
            <?= $form->field($model, 'status',['template' => "{hint}\n{error}",]) ?>
        </div>

        <div>
            <?= $form->field($model, 'status',['template' => "{hint}\n{error}",]) ?>
        </div>
        <?= $form->field($model, 'favourite')->textInput() ?>
        <div>Адрес</div>
        <div>
            <label for="address-town">Город</label>
            <select id="address-town" name="Address[town]">
                <option value="">Не выбран</option>
                <?= Html::renderSelectOptions(($model->isNewRecord) ? "" : $model->address->town, ArrayHelper::map($town, 'name', 'name')); ?>
            </select>
            <?=$form->field($model->address,'town',['template' => "{hint}\n{error}",])?>
        </div>
        <div>
            <label for="address-district">Район</label>
            <select id="address-district" name="Address[district]">
                <option value="">Не выбран</option>
                <?= Html::renderSelectOptions(($model->isNewRecord) ? "" : $model->address->district, ArrayHelper::map($district, 'name', 'name')); ?>
            </select>
            <?=$form->field($model->address,'district',['template' => "{hint}\n{error}",])?>
        </div>
        <div>
            <label for="address-metro">Метро</label>
            <select id="address-metro" name="Address[metro]">
                <option value="">Не выбран</option>
                <?= Html::renderSelectOptions(($model->isNewRecord) ? "" : $model->address->metro, ArrayHelper::map($metro, 'name', 'name')); ?>
            </select>
        </div>
        <?= $form->field($model->address, 'house')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model->address, 'block')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model->address, 'comment')->textarea(['rows' => 6]) ?>
    </div>
    <div>
        <div>Параметры Зала</div>
        <?= $form->field($model, 'comments')->textarea(['rows' => 6]) ?>
        <?= $form->field($model, 'square')->textInput() ?>
        <div>
            <div>Цены</div>
            <?= $form->field($model->price, 'min')->textInput() ?>
            <?= $form->field($model->price, 'max')->textInput() ?>
        </div>
        <div>
            <label for="hall-category">Назначение:</label>
            <select id="hall-category" name="Hall[category_id]">
                <?= Html::renderSelectOptions($model->category_id, ArrayHelper::map($category, 'id', 'name')); ?>
            </select>
        </div>
        <div>
            <div>Опции зала</div>
            <?php
                $list=ArrayHelper::map($options,'id','name');
                ?>
            <?= $form->field($model,'options')->label(false)->checkboxList($list); ?>
        </div>
        <div>
            <label for="hall-floor">Покрытие:</label>
            <select id="hall-floor" name="Hall[floor_id]">
                <?= Html::renderSelectOptions($model->floor_id, ArrayHelper::map($floor, 'id', 'name')); ?>
            </select>
        </div>
    </div>
    <div>
        <div>Контакты</div>
        <?= $form->field($model->contacts, 'name')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model->contacts, 'email')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model->contacts, 'phone')->textInput(['maxlength' => true]) ?>
    </div>

    <div class="form-group">
        <?=$this->render('_attribs',['attribs'=>$model->attribs])?>
    </div>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
