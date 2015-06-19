<?php
use yii\captcha\Captcha;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

/**
 * @var \common\models\Hall $model
 * @var \common\models\Floor[] $floor
 * @var \common\models\Category[] $category
 * @var \common\models\Options[] $options
 * @var \common\models\Metro[] $metro
 * @var \common\models\District[] $district
 * @var \common\models\Town[] $town
 *
 * @var $form yii\widgets\ActiveForm
 */

$images = null;
$geocode = null;

if (!$model->isNewRecord) {
    $attribs = json_decode($model->attribs);
    $images = $attribs->images;
    $geocode = $attribs->geocode;
}
?>

<div class="modal-hall-form-location" xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html">
    <div class="modal-hall-form-location__header">Местоположение зала</div>
    <div class="modal-hall-form-col">
        <input type="hidden" name="_csrf" value="<?= Yii::$app->request->getCsrfToken() ?>"/>
        <input type="hidden" name="Hall[geocode]" value='<?= $geocode; ?>'>
        <div class="modal-hall-form__line"><label class="modal-hall-form-location__label" for="address-town">Город:</label>
            <select id="address-town" class="modal-hall-form-location__select" name="Address[town]">
                <option value="">Не выбран</option>
                <?= Html::renderSelectOptions(($model->isNewRecord) ? "" : $model->address->town, ArrayHelper::map($town, 'name', 'name')); ?>
            </select>
            <?=$form->field($model->address,'town',['template' => "{hint}\n{error}",])?>
        </div>

        <div  class="modal-hall-form__line"><label class="modal-hall-form-location__label" for="address-metro">Метро:</label>
            <select id="address-metro" class="modal-hall-form-location__select" name="Address[metro]">
                <option value="">Не выбран</option>
                <?= Html::renderSelectOptions(($model->isNewRecord) ? "" : $model->address->metro, ArrayHelper::map($metro, 'name', 'name')); ?>
            </select>
        </div>
        <div  class="modal-hall-form__line"><label class="modal-hall-form-location__label" for="address-district">Район:</label>
            <select id="address-district" class="modal-hall-form-location__select" name="Address[district]">
                <option value="">Не выбран</option>
                <?= Html::renderSelectOptions(($model->isNewRecord) ? "" : $model->address->district, ArrayHelper::map($district, 'name', 'name')); ?>
            </select>
            <?=$form->field($model->address,'district',['template' => "{hint}\n{error}",])?>
        </div>
        <div class="modal-hall-form__line">
            <?=$form->field($model->address,'street')->
            textInput(['class'=>'modal-hall-form-location__select address__street'])->
            label('Улица:',['class'=>'modal-hall-form-location__label'])
            ?>
        </div>
        <div class="modal-hall-form__line">
            <?=$form->field($model->address,'house')->
            textInput(['class'=>'modal-hall-form-location__input'])->
            label('Дом:',['class'=>'modal-hall-form-location__label'])
            ?>

            <?=$form->field($model->address,'block')->
            textInput(['class'=>'modal-hall-form-location__input'])->
            label('Блок:',['class'=>'modal-hall-form-location__label'])
            ?>
        </div>
    </div>
    <div class="modal-hall-form-col modal-hall-form-col_right">
        <div class="modal-hall-form__line">
            <?=$form->field($model->address,'comment')->
            textarea(['class'=>'modal-hall-form-location__textarea','rows' => 7])->
            label('Примечание как добраться:',['class'=>'modal-hall-form-location__label'])
            ?>
        </div>
    </div>
</div>
<div class="modal-hall-form-params">
    <div class="modal-hall-form-params__header">Параметры зала</div>
    <div class="modal-hall-form-col">
        <div class="modal-hall-form__line">
            <label class="modal-hall-form-params__label" for="hall-category">Назначение:</label>
            <select id="hall-category" class="modal-hall-form-params__select" name="Hall[category_id]">
                <?= Html::renderSelectOptions($model->category_id, ArrayHelper::map($category, 'id', 'name')); ?>
            </select>
        </div>
        <div class="modal-hall-form__line">
            <?=$form->field($model,'square',['template' => "{label}\n{input} м<sup>2</sup>\n{hint}\n{error}",])->
            textInput(['class'=>'modal-hall-form-params__square'])->
            label('Площадь:',['class'=>'modal-hall-form-params__label'])
            ?>
        </div>

        <div class="modal-hall-form__line">
            <div class="modal-hall-form-params__label">Оборудование зала:</div>
            <div class="modal-hall-form-params-cover">
                    <label class="modal-hall-form-params-cover__label" for="hall-floor">Покрытие:</label>
                    <select id="hall-floor" class="modal-hall-form-params-cover__select" name="Hall[floor_id]">
                        <?= Html::renderSelectOptions($model->floor_id, ArrayHelper::map($floor, 'id', 'name')); ?>
                    </select>
            </div>
        </div>
        <div class="modal-hall-form-checklist">
            <?=$form->field($model,'options')->
            label(false)->
            checkboxList(ArrayHelper::map($options,'id','name'),[
                'itemOptions'=>['labelOptions'=>['class'=>'modal-hall-form-checklist-item']]
            ]);
            ?>
        </div>
        <div>
            <label for="hall-comments">Дополнительное оборудование:</label>
            <textarea id="hall-comments" class="modal-hall-form-params__textarea" name="Hall[comments]"></textarea>
        </div>
    </div>
    <div class="modal-hall-form-col modal-hall-form-col_right">
        <div class="modal-hall-form-params-price">
            <span class="modal-hall-form-params__label modal-hall-form-params__price">Стоимость аренды:</span>

            <div class="modal-hall-form-params-price-min">
                <div class="modal-hall-form-params-price-min__label">

                    <?=$form->field($model->price,'min',['template' => "{label}\n{input} руб./час\n{hint}\n{error}",])->
                    textInput(['class'=>'modal-hall-form-params-price-min__input'])->
                    label('Минимальная',['class'=>'modal-hall-form-params-price-min__label'])
                    ?>
                </div>
            </div>
            <div class="modal-hall-form-params-price-max">
                <?=$form->field($model->price,'max',['template' => "{label}\n{input} руб./час\n{hint}\n{error}",])->
                textInput(['class'=>'modal-hall-form-params-price-max__input'])->
                label('Максимальная',['class'=>'modal-hall-form-params-price-max__label'])
                ?>
            </div>
        </div>
        <div class="modal-hall-form-params-album">
            <div class="modal-hall-form-params__label modal-hall-form-params-album__label">Фотографии зала (не более 9
                шт.)
            </div>
            <div class="modal-hall-form-params-album-content">
                <?php
                if (!is_null($images)) {
                    foreach ($images as $key => $image) {
                        print "
                        <div class='modal-hall-form-params-album-content-item'>
                            <a class='modal-hall-form-params-album-content-image-remove i-icons i-close_black' href='#' onclick='album.removeImage(this)'></a>
                            <img class='modal-hall-form-params-album-content-item__img' src='/$image->slide'>
                        </div>
                        \n";
                    }
                    $options['max'] = 3;
                    $different = abs(count($images) % $options['max'] - $options['max']);
                    for ($i = 0; $i < $different; $i++)
                        print("<div class='modal-hall-form-params-album-content-item' style='width: 100px;'></div>\n");
                }
                ?>
                <div class="modal-hall-form-params-album-content-item">
                    <label><input class="modal-hall-form-params-album-content__input" type="file" name="Hall[images][]"></label>
                    <span class="modal-hall-form-params-album-content-item_remove i-icons i-close_black"
                          onclick="album.remove(this)"></span>
                </div>
            </div>
            <div class="modal-hall-form-params-album-button" onclick="album.addImage()"><span>+</span> Добавить фото
            </div>
        </div>
    </div>
</div>
<div class="modal-hall-form-contacts">
    <div class="modal-hall-form-contacts__header">Контакты</div>
    <div class="modal-hall-form__line">
        <?=$form->field($model->contacts,'name')->
        textInput(['class'=>'modal-hall-form-contacts__input'])->
        label('Имя:',['class'=>'modal-hall-form-contacts__label'])
        ?>
    </div>
    <div class="modal-hall-form__line">
        <?=$form->field($model->contacts,'phone')->
        textInput(['class'=>'modal-hall-form-contacts__input','type'=>'tel','placeholder'=>'+7 (9__) __-__-__'])->
        label('Телефон:',['class'=>'modal-hall-form-contacts__label'])
        ?>
    </div>
    <div class="modal-hall-form__line">
        <?=$form->field($model->contacts,'email')->
        textInput(['class'=>'modal-hall-form-contacts__input','type'=>'email'])->
        label('E-mail:',['class'=>'modal-hall-form-contacts__label'])
        ?>
    </div>
    <div class="modal-hall-form__line">
        <?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
            'captchaAction'=>'hall/captcha',
            'options'=>['class'=>'modal-hall-form-contacts-capthca__input'],
            'imageOptions'=>['class'=>'modal-hall-form-contacts-capthca__image'],
            'template' => "{input}\n{image}",
        ])->label('Введите текст с картинки:') ?>
    </div>
</div>
<button class="modal-hall__button"><span class="i-icons i-add-white"></span> <span class="btn__label"><?=($model->isNewRecord)?"Добавить зал в базу":"Обновить зал"?></span></button>