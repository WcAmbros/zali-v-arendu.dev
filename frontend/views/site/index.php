<?php
/**
 * @var $this yii\web\View
 *
 * @var array $floor
 * @var array $category
 * @var array $options
 * @var array $metro
 * @var array $district
 */

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Залы в аренду';

$this->registerCssFile('https://dadata.ru/static/css/lib/suggestions-15.2.css');
$this->registerJsFile('https://dadata.ru/static/js/lib/jquery.suggestions-15.2.min.js');
$this->registerJsFile('/template/site/js/dadata.js');

?>
<div class="main">
    <div class="main-background">
        <div class="main-background-slider">
            <img src="/images/slider/slide.jpg">
        </div>
    </div>
    <div class="main-section">
        <div class="main-find">
            <div class="main-find__header">Найти зал</div>
            <form class="main-find-form" action="<?=(Url::toRoute('hall/search'))?>" method="post">
                <input type="hidden" name="_csrf" value="<?=Yii::$app->request->getCsrfToken()?>" />
                <fieldset>
                    <label  class="main-find-form-label"><span class="main-find-form-label__span">Вид зала:</span>
                        <select class="main-find-form-label__select" name="Search[category]">
                            <option value="">Не выбрано</option>
                            <?= Html::renderSelectOptions('',ArrayHelper::map($category,'name','name'));?>
                        </select>

                    </label>
                    <label  class="main-find-form-label"><span class="main-find-form-label__span">Район города:</span>
                        <select class="main-find-form-label__select" name="Search[district]">
                            <option value="">Не выбрано</option>
                            <?= Html::renderSelectOptions('',ArrayHelper::map($district,'name','name'));?>
                            <?php
                            //AutoComplete::widget($district);
                            ?>
                        </select>
                    </label>
                    <label  class="main-find-form-label"><span class="main-find-form-label__span">Станция метро:</span>

                        <select class="main-find-form-label__select" name="Search[metro]">
                            <option value="">Не выбрано</option>
                            <?= Html::renderSelectOptions('',ArrayHelper::map($metro,'name','name'));?>
                            <?php
                            //AutoComplete::widget($metro);
                            ?>
                        </select>
                    </label>
                </fieldset>
                <button class="main-find-form__button main__button" ><span class="i-icons i-search"></span>Найти</button>
            </form>
        </div>
        <div class="main__add main__button" onclick="button.form('/hall/form')">
            <span class="i-icons i-add"></span>Добавить зал в базу
        </div>
    </div>

    <div class="main-caption">В нашей базе свыше <span class="main-caption__span">100 000</span> залов</div>
    <div class="deals">
        <div class="deals__header">Лучшие предложения в Санкт-Петербурге</div>
        <div class="deals-content">
            <div class="deals-item">
                <div class="b-star i-shadow"><span class="i-icons i-star"></span></div>
                <img src="/images/thumb-3.jpg">
                <div class="deals-item-description">
                    <a href="#" class="deals-item-description__address">Ул. Диктатуры Пролетариата, д.12</a>
                    <p><span class="i-icons i-metro_red"></span> Технологический институт, от метро: 1020 м</p>
                    <div class="deals-item-description__map">Смотреть на карте<span class="i-icons i-map"></span></div>
                    <p><strong>120м<sup>2</sup></strong>, <strong>2 000</strong> руб./ час</p>
                </div>
            </div>
            <div class="deals-item">
                <div class="b-star i-shadow"><span class="i-icons i-star"></span></div>
                <img src="/images/thumb-4.jpg">
                <div class="deals-item-description">
                    <a href="#" class="deals-item-description__address">Ул. Хохрякова, д.123</a>
                    <p><span class="i-icons i-metro_purple"></span> Пр-т Просвещения, от метро: 500 м</p>
                    <div class="deals-item-description__map">Смотреть на карте<span class="i-icons i-map"></span></div>
                    <p><strong>120м<sup>2</sup></strong>, <strong>2 000</strong> руб./ час</p>
                </div>
            </div>
            <div class="deals-item">
                <div class="b-star i-shadow"><span class="i-icons i-star"></span></div>
                <img src="/images/thumb-1.jpg">
                <div class="deals-item-description">
                    <a href="#" class="deals-item-description__address">Ул. Лизы Чайкиной, д.67</a>
                    <p><span class="i-icons i-metro_green"></span> Пл. Александра Невского, от метро: 1000 м</p>
                    <div class="deals-item-description__map">Смотреть на карте<span class="i-icons i-map"></span></div>
                    <p><strong>120м<sup>2</sup></strong>, <strong>2 000</strong> руб./ час</p>
                </div>
            </div>
            <div class="deals-item">
                <div class="b-star i-shadow"><span class="i-icons i-star"></span></div>
                <img src="/images/thumb-2.jpg">
                <div class="deals-item-description">
                    <a href="#" class="deals-item-description__address">Ул. Диктатуры Пролетариата, д.12, корп. 3</a>
                    <p><span class="i-icons i-metro_orange"></span> Пл. Александра Невского, от метро: 1000 м</p>
                    <div class="deals-item-description__map">Смотреть на карте<span class="i-icons i-map"></span></div>
                    <p><strong>120м<sup>2</sup></strong>, <strong>2 000</strong> руб./ час</p>
                </div>
            </div>
            <div class="deals-item">
                <div class="b-star i-shadow"><span class="i-icons i-star"></span></div>
                <img src="/images/thumb-1.jpg">
                <div class="deals-item-description">
                    <a href="#" class="deals-item-description__address">Ул. Лизы Чайкиной, д.67</a>
                    <p><span class="i-icons i-metro_green"></span> Пл. Александра Невского, от метро: 1000 м</p>
                    <div class="deals-item-description__map">Смотреть на карте<span class="i-icons i-map"></span></div>
                    <p><strong>120м<sup>2</sup></strong>, <strong>2 000</strong> руб./ час</p>
                </div>
            </div>
            <div class="deals-item">
                <div class="b-star i-shadow"><span class="i-icons i-star"></span></div>
                <img src="/images/thumb-2.jpg">
                <div class="deals-item-description">
                    <a href="#" class="deals-item-description__address">Ул. Диктатуры Пролетариата, д.12, корп. 3</a>
                    <p><span class="i-icons i-metro_orange"></span> Пл. Александра Невского, от метро: 1000 м</p>
                    <div class="deals-item-description__map">Смотреть на карте<span class="i-icons i-map"></span></div>
                    <p><strong>120м<sup>2</sup></strong>, <strong>2 000</strong> руб./ час</p>
                </div>
            </div>
            <div class="deals-item">
                <div class="b-star i-shadow"><span class="i-icons i-star"></span></div>
                <img src="/images/thumb-3.jpg">
                <div class="deals-item-description">
                    <a href="#" class="deals-item-description__address">Ул. Диктатуры Пролетариата, д.12</a>
                    <p><span class="i-icons i-metro_red"></span> Технологический институт, от метро: 1020 м</p>
                    <div class="deals-item-description__map">Смотреть на карте<span class="i-icons i-map"></span></div>
                    <p><strong>120м<sup>2</sup></strong>, <strong>2 000</strong> руб./ час</p>
                </div>
            </div>
            <div class="deals-item">
                <div class="b-star i-shadow"><span class="i-icons i-star"></span></div>
                <img src="/images/thumb-4.jpg">
                <div class="deals-item-description">
                    <a href="#" class="deals-item-description__address">Ул. Хохрякова, д.123</a>
                    <p><span class="i-icons i-metro_purple"></span> Пр-т Просвещения, от метро: 500 м</p>
                    <div class="deals-item-description__map">Смотреть на карте<span class="i-icons i-map"></span></div>
                    <p><strong>120м<sup>2</sup></strong>, <strong>2 000</strong> руб./ час</p>
                </div>
            </div>
        </div>
        <div class="deals__more">
            <a href="#" >Все предложения города</a>
        </div>
    </div>
    <div class="main__header">Залы в аренду в Санкт-Петербурге</div>
    <div class="main-content">
        <p>Приветливый и симпатичный коллектив Конгресс-холла "Васильевский" быстро подготовит для Вас один или несколько из наших 30 залов: установит и настроит все необходимое оборудование, подберет комфортную температуру (при помощи японской системы кондиционирования),  согласует с Вами меню и обеспечит питание (с учетом национальных и вегетарианских кухонь), а так же окажет услуги сервиса от гостиничного расселения и трансфера до визовой поддержки.</p>
        <p>Приветливый и симпатичный коллектив Конгресс-холла "Васильевский" быстро подготовит для Вас один или несколько из наших 30 залов: установит и настроит все необходимое оборудование, подберет комфортную температуру (при помощи японской системы кондиционирования),  согласует с Вами меню и обеспечит питание (с учетом национальных и вегетарианских кухонь), а так же окажет услуги сервиса от гостиничного расселения и трансфера до визовой поддержки.</p>
    </div>
</div>
