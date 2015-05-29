<?php

/**
 * @var array $floor
 * @var array $category
 * @var array $options
 * @var array $metro
 * @var array $district
 * @var \frontend\models\Hall $model
 *
 */

use yii\helpers\ArrayHelper;
use yii\helpers\Html;


$images=null;
$geocode=null;

if(!$model->isNewRecord){
    $attribs=json_decode($model->attribs);
    $images=$attribs->images;
    $geocode=$attribs->geocode;
}
?>

<div class="modal-hall-form-location">
    <div class="modal-hall-form-location__header">Местоположение зала</div>

    <div class="modal-hall-form-col">
        <input type="hidden" name="_csrf" value="<?=Yii::$app->request->getCsrfToken()?>" />
        <input type="hidden" name="Hall[geocode]" value='<?=$geocode;?>'>
        <label class="modal-hall-form__line">
            <span>Адрес</span>
            <input class="modal-hall-form-col__address" name="Hall[address]" value="<?=$model->name;?>">
        </label>
        <label class="modal-hall-form__line"><span class="modal-hall-form-location__label">Город:</span>
            <input class="modal-hall-form-location__select" name="Address[town]" value="<?=($model->isNewRecord)?"":$model->address->town?>">
        </label>
        <label class="modal-hall-form__line"><span class="modal-hall-form-location__label">Метро:</span>
            <select class="modal-hall-form-location__select"  name="Address[metro]">
                <option></option>
                <?= Html::renderSelectOptions(($model->isNewRecord)?"":$model->address->metro,ArrayHelper::map($metro,'name','name'));?>
            </select>

        </label>
        <label class="modal-hall-form__line"><span class="modal-hall-form-location__label">Район:</span>
            <select class="modal-hall-form-location__select"  name="Address[district]">
                <option></option>
                <?= Html::renderSelectOptions(($model->isNewRecord)?"":$model->address->district,ArrayHelper::map($district,'name','name'));?>
            </select>
        </label>
        <label class="modal-hall-form__line"><span class="modal-hall-form-location__label">Улица:</span>
            <input class="modal-hall-form-location__select"  name="Address[street]">
        </label>
        <label class="modal-hall-form__line">
            <span class="modal-hall-form-location__label">Дом:</span>
            <input class="modal-hall-form-location__input"  name="Address[house]" value="<?=($model->isNewRecord)?"":$model->address->house?>">
            <span class="modal-hall-form-location__label">Корпус:</span>
            <input class="modal-hall-form-location__input"  name="Address[block]" value="<?=($model->isNewRecord)?"":$model->address->block?>">
        </label>
    </div>
    <div class="modal-hall-form-col modal-hall-form-col_right">
        <label class="modal-hall-form__line">
            <span class="modal-hall-form-location__label">Примечание как добраться:</span>
            <textarea class="modal-hall-form-location__textarea"  name="Address[comment]">
                <?=($model->isNewRecord)?"":$model->address->comment;?>
            </textarea>
        </label>
    </div>
</div>
<div class="modal-hall-form-params">
    <div class="modal-hall-form-params__header">Параметры зала</div>
    <div class="modal-hall-form-col">
        <label class="modal-hall-form__line">
            <span class="modal-hall-form-params__label">Назначение:</span>
            <select class="modal-hall-form-params__select"  name="Hall[category]">
                <?= Html::renderSelectOptions($model->category_id,ArrayHelper::map($category,'id','name'));?>
            </select>
        </label>
        <label class="modal-hall-form__line">
            <span class="modal-hall-form-params__label">Площадь:</span>
            <?=Html::input('text','Hall[square]',$model->square,[
                'class'=>'modal-hall-form-params__square'
            ])?> м<sup>2</sup>

        </label>
        <div class="modal-hall-form__line">
            <div class="modal-hall-form-params__label">Оборудование зала:</div>
            <div  class="modal-hall-form-params-cover">
                <label>
                    <span class="modal-hall-form-params-cover__label">Покрытие:</span>
                    <select class="modal-hall-form-params-cover__select"  name="Hall[floor]">
                        <?= Html::renderSelectOptions($model->floor_id,ArrayHelper::map($floor,'id','name'));?>
                    </select>
                </label>
            </div>
        </div>
        <div class="modal-hall-form-checklist">
            <?php
            $hallHasOptions=array();
            if(!$model->isNewRecord){
                $hallHasOptions=ArrayHelper::map($model->hallHasOptions,'options_id','options_id');
            }
            foreach($options as $item){
                print '<label class="modal-hall-form-checklist-item">';
                $checked=false;
                if(!$model->isNewRecord&&(in_array($item->id,$hallHasOptions)))
                    $checked=true;

                echo Html::checkbox('Options[]',$checked,[
                    'value'=> $item->id
                ]);
                print_r("$item->name</label>\n");
            }
            ?>
        </div>
        <label>
            <span>Дополнительное оборудование:</span>
            <textarea class="modal-hall-form-params__textarea" name="Hall[optional_equipment]"></textarea>
        </label>
    </div>
    <div class="modal-hall-form-col modal-hall-form-col_right">
        <div class="modal-hall-form-params-price">
            <span class="modal-hall-form-params__label modal-hall-form-params__price">Стоимость аренды:</span>
            <div class="modal-hall-form-params-price-min">
                <div class="modal-hall-form-params-price-min__label">Минимальная</div>
                <label>
                    <input class="modal-hall-form-params-price-min__input" name="Price[min]" value="<?=($model->isNewRecord)?"":$model->price->min?>"/> руб./час.
                </label>
            </div>
            <div class="modal-hall-form-params-price-max">
                <div class="modal-hall-form-params-price-max__label">Максимальная</div>
                <label><input class="modal-hall-form-params-price-max__input" name="Price[max]" value="<?=($model->isNewRecord)?"":$model->price->min?>"/> руб./час.</label>
            </div>
        </div>
        <div class="modal-hall-form-params-album">
            <div class="modal-hall-form-params__label modal-hall-form-params-album__label">Фотографии зала (не более 9 шт.)</div>
            <div class="modal-hall-form-params-album-content">
                <div class="modal-hall-form-params-album-content-item">
                    <label><input class="modal-hall-form-params-album-content__input" type="file" name="Hall[images][]"></label>
                    <span class="modal-hall-form-params-album-content-item_remove i-icons i-close_black" onclick="album.remove(this)"></span>
                </div>
            </div>
            <div class="modal-hall-form-params-album-button"><span>+</span> Добавить фото</div>
        </div>
    </div>
</div>
<div class="modal-hall-form-contacts">
    <div class="modal-hall-form-contacts__header">Контакты</div>
    <label class="modal-hall-form__line"><span class="modal-hall-form-contacts__label">Имя:</span>
        <input class="modal-hall-form-contacts__input" name="Contacts[name]" value="<?=($model->isNewRecord)?"":$model->contacts->name?>"/></label>
    <label class="modal-hall-form__line"><span class="modal-hall-form-contacts__label" value="<?=($model->isNewRecord)?"":$model->contacts->phone?>">Телефон:</span>
        <input class="modal-hall-form-contacts__input" name="Contacts[phone]"></label>
    <label class="modal-hall-form__line"><span class="modal-hall-form-contacts__label" value="<?=($model->isNewRecord)?"":$model->contacts->email?>">E-mail:</span>
        <input class="modal-hall-form-contacts__input"  name="Contacts[email]"></label>
    <div class="modal-hall-form-contacts-capthca">
        <label class="modal-hall-form__line"><span>Введите текст с картинки:</span>
            <input class="modal-hall-form-contacts-capthca__input">
        </label>
    </div>
</div>