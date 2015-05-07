<?php
/* @var $this yii\web\View */
$this->title = 'Залы в аренду';
?>

<div class="add-hall">
    <div class="add-hall-background"></div>
    <form class="add-hall-form" action="/add" method="post" enctype="multipart/form-data">
        <div class="add-hall-form__header">Добавить зал в базу <span class="add-hall-form__close i-close i-icons" onclick="button.close('.add-hall')"></span></div>
        <div class="add-hall-form-location">
            <div class="add-hall-form-location__header">Местоположение зала</div>

            <div class="add-hall-form-col">
                <input type="hidden" name="_csrf" value="<?=Yii::$app->request->getCsrfToken()?>" />
                <label class="add-hall-form__line">
                    <span>Адрес</span>
                    <input class="add-hall-form-col__address" name="Hall[address]">
                </label>
                <label class="add-hall-form__line"><span class="add-hall-form-location__label">Город:</span>
                    <input class="add-hall-form-location__select" name="Hall[town]">
                </label>
                <label class="add-hall-form__line"><span class="add-hall-form-location__label">Метро:</span>
                    <input class="add-hall-form-location__select"  name="Hall[metro]">
                </label>
                <label class="add-hall-form__line"><span class="add-hall-form-location__label">Район:</span>
                    <input class="add-hall-form-location__select"  name="Hall[district]">
                </label>
                <label class="add-hall-form__line"><span class="add-hall-form-location__label">Улица:</span>
                    <input class="add-hall-form-location__select"  name="Hall[street]">
                </label>
                <label class="add-hall-form__line">
                    <span class="add-hall-form-location__label">Дом:</span>
                    <input class="add-hall-form-location__input"  name="Hall[house]">
                    <span class="add-hall-form-location__label">Корпус:</span>
                    <input class="add-hall-form-location__input"  name="Hall[block]">
                </label>

                <label class="add-hall-form__line">
                    <span class="add-hall-form-file__label">Изображение:</span>
                    <input class="add-hall-form-file__input" type="file" name="Hall[image]">
                </label>
            </div>
            <div class="add-hall-form-col add-hall-form-col_right">
                <label class="add-hall-form__line">
                    <span class="add-hall-form-location__label">Примечание как добраться:</span>
                    <textarea class="add-hall-form-location__textarea"  name="Hall[comment]"></textarea>
                </label>
            </div>
        </div>
                <div class="add-hall-form-params">
                    <div class="add-hall-form-params__header">Параметры зала</div>
                    <div class="add-hall-form-col">
                        <label class="add-hall-form__line">
                            <span class="add-hall-form-params__label">Назначение:</span>
                            <select class="add-hall-form-params__select"  name="Params[type]">
                                <option>Не выбран</option>
                                <option>Для танцев</option>
                            </select>
                        </label>
                        <label class="add-hall-form__line">
                            <span class="add-hall-form-params__label">Площадь:</span>
                            <input class="add-hall-form-params__square" name="Hall[square]"/> м<sup>2</sup>
                        </label>
                        <div class="add-hall-form__line">
                            <div class="add-hall-form-params__label">Оборудование зала:</div>
                            <div  class="add-hall-form-params-cover">
                                <label>
                                    <span class="add-hall-form-params-cover__label">Покрытие:</span>
                                    <select class="add-hall-form-params-cover__select"  name="Params[flooring]">
                                        <option>Не выбран</option>
                                        <option>Ламинат</option>
                                    </select>
                                </label>
                            </div>
                        </div>
                        <div class="add-hall-form-checklist">
                            <label class="add-hall-form-checklist-item"><input type="checkbox" name="Params[equipment][]"/> Раздевалка</label>
                            <label class="add-hall-form-checklist-item"><input type="checkbox" name="Params[equipment][]"/> Душевые</label>
                            <label class="add-hall-form-checklist-item"><input type="checkbox" name="Params[equipment][]"/> Куллер с водой</label>
                            <label class="add-hall-form-checklist-item"><input type="checkbox" name="Params[equipment][]"/> Wi-Fi</label>
                            <label class="add-hall-form-checklist-item"><input type="checkbox" name="Params[equipment][]"/> Зеркальная стена</label>
                        </div>
                        <label>
                            <span>Дополнительное оборудование:</span>
                            <textarea class="add-hall-form-params__textarea" name="Params[additional_equipment]"></textarea>
                        </label>
                    </div>
                    <div class="add-hall-form-col add-hall-form-col_right">
                        <div class="add-hall-form-params-price">
                            <span class="add-hall-form-params__label add-hall-form-params__price">Стоимость аренды:</span>
                            <div class="add-hall-form-params-price-min">
                                <div class="add-hall-form-params-price-min__label">Минимальная</div>
                                <label>
                                    <input class="add-hall-form-params-price-min__input" name="Price[min]"/> руб./час.
                                </label>
                            </div>
                            <div class="add-hall-form-params-price-max">
                                <div class="add-hall-form-params-price-max__label">Максимальная</div>
                                <label><input class="add-hall-form-params-price-max__input" name="Price[max]"/> руб./час.</label>
                            </div>
                        </div>
                        <div class="add-hall-form-params-album">
                            <div class="add-hall-form-params__label add-hall-form-params-album__label">Фотографии зала (не более 9 шт.)</div>
                            <div class="add-hall-form-params-album-content">
                                <div class="add-hall-form-params-album-content-item">
                                    <a href="#" class="add-hall-form-params-album-content-item-remove i-icons i-close_black"></a>
                                    <img class="add-hall-form-params-album-content-item__img" src="images/thumb-4.jpg">
                                </div>
                                <div class="add-hall-form-params-album-content-item">
                                    <a href="#" class="add-hall-form-params-album-content-item-remove i-icons i-close_black"></a>
                                    <img class="add-hall-form-params-album-content-item__img" src="images/thumb-3.jpg">
                                </div>
                                <div class="add-hall-form-params-album-content-item">
                                    <a href="#" class="add-hall-form-params-album-content-item-remove i-icons i-close_black"></a>
                                    <img class="add-hall-form-params-album-content-item__img" src="images/thumb-1.jpg">
                                </div>
                                <div class="add-hall-form-params-album-content-item">
                                    <a href="#" class="add-hall-form-params-album-content-item-remove i-icons i-close_black"></a>
                                    <img class="add-hall-form-params-album-content-item__img" src="images/thumb-2.jpg">
                                </div>
                                <div class="add-hall-form-params-album-content-item">
                                    <a href="#" class="add-hall-form-params-album-content-item-remove i-icons i-close_black"></a>
                                    <img class="add-hall-form-params-album-content-item__img" src="images/thumb-3.jpg">
                                </div>
                                <div class="add-hall-form-params-album-content-item">
                                    <a href="#" class="add-hall-form-params-album-content-item-remove i-icons i-close_black"></a>
                                    <img class="add-hall-form-params-album-content-item__img" src="images/thumb-4.jpg">
                                </div>
                                <div class="add-hall-form-params-album-content-item">
                                    <a href="#" class="add-hall-form-params-album-content-item-remove i-icons i-close_black"></a>
                                    <img class="add-hall-form-params-album-content-item__img" src="images/thumb-1.jpg">
                                </div>
                                <div class="add-hall-form-params-album-content-item">
                                    <a href="#" class="add-hall-form-params-album-content-item-remove i-icons i-close_black"></a>
                                    <img class="add-hall-form-params-album-content-item__img" src="images/thumb-2.jpg">
                                </div>
                                <div class="add-hall-form-params-album-content-item">
                                    <a href="#" class="add-hall-form-params-album-content-item-remove i-icons i-close_black"></a>
                                    <img class="add-hall-form-params-album-content-item__img" src="images/thumb-3.jpg">
                                </div>
                            </div>
                            <div class="add-hall-form-params-album-button"><span>+</span> Добавить фото</div>
                        </div>
                    </div>
                </div>
                <div class="add-hall-form-contacts">
                    <div class="add-hall-form-contacts__header">Контакты</div>
                    <label class="add-hall-form__line"><span class="add-hall-form-contacts__label">Имя:</span>
                        <input class="add-hall-form-contacts__input" name="Agent[attribs][name]"/></label>
                    <label class="add-hall-form__line"><span class="add-hall-form-contacts__label">Телефон:</span>
                        <input class="add-hall-form-contacts__input" name="Agent[attribs][phone]"></label>
                    <label class="add-hall-form__line"><span class="add-hall-form-contacts__label">E-mail:</span>
                        <input class="add-hall-form-contacts__input"  name="Agent[attribs][email]"></label>

                    <div class="add-hall-form-contacts-capthca">
                        <label class="add-hall-form__line"><span>Введите текст с катртинки:</span>
                            <input class="add-hall-form-contacts-capthca__input">
                        </label>
                    </div>
                </div>
        <button class="add-hall__button"><span class="i-icons i-add"></span> Добавить зал в базу</button>
    </form>
</div>
<div class="main">
    <div class="main-background">
        <div class="main-background-slider">
            <img src="images/slider/slide.jpg">
        </div>
    </div>
    <div class="main-section">
        <div class="main-find">
            <div class="main-find__header">Найти зал</div>
            <form class="main-find-form">
                <fieldset>
                    <label  class="main-find-form-label"><span class="main-find-form-label__span">Вид зала:</span>
                        <select class="main-find-form-label__select">
                            <option>Танцевальный зал</option>
                        </select>
                    </label>
                    <label  class="main-find-form-label"><span class="main-find-form-label__span">Район города:</span>
                        <select class="main-find-form-label__select">
                            <option>Красногвардейский</option>
                        </select>
                    </label>
                    <label  class="main-find-form-label"><span class="main-find-form-label__span">Станция метро:</span>
                        <select class="main-find-form-label__select">
                            <option>Технологический</option>
                        </select>
                    </label>
                </fieldset>
                <button class="main-find-form__button main__button"><span class="i-icons i-search"></span>Найти</button>
            </form>
        </div>
        <div class="main__add main__button" onclick="button.show('.add-hall')">
            <span class="i-icons i-add"></span>Добавить зал в базу
        </div>
    </div>

    <div class="main-caption">В нашей базе свыше <span class="main-caption__span">100 000</span> залов</div>
    <div class="deals">
        <div class="deals__header">Лучшие предложения в Санкт-Петербурге</div>
        <div class="deals-content">
            <div class="deals-item">
                <div class="b-star i-shadow"><span class="i-icons i-star"></span></div>
                <img src="images/thumb-3.jpg">
                <div class="deals-item-description">
                    <a href="#" class="deals-item-description__address">Ул. Диктатуры Пролетариата, д.12</a>
                    <p><span class="i-icons i-metro_red"></span> Технологический институт, от метро: 1020 м</p>
                    <div class="deals-item-description__map">Смотреть на карте<span class="i-icons i-map"></span></div>
                    <p><strong>120м<sup>2</sup></strong>, <strong>2 000</strong> руб./ час</p>
                </div>
            </div>
            <div class="deals-item">
                <div class="b-star i-shadow"><span class="i-icons i-star"></span></div>
                <img src="images/thumb-4.jpg">
                <div class="deals-item-description">
                    <a href="#" class="deals-item-description__address">Ул. Хохрякова, д.123</a>
                    <p><span class="i-icons i-metro_purple"></span> Пр-т Просвещения, от метро: 500 м</p>
                    <div class="deals-item-description__map">Смотреть на карте<span class="i-icons i-map"></span></div>
                    <p><strong>120м<sup>2</sup></strong>, <strong>2 000</strong> руб./ час</p>
                </div>
            </div>
            <div class="deals-item">
                <div class="b-star i-shadow"><span class="i-icons i-star"></span></div>
                <img src="images/thumb-1.jpg">
                <div class="deals-item-description">
                    <a href="#" class="deals-item-description__address">Ул. Лизы Чайкиной, д.67</a>
                    <p><span class="i-icons i-metro_green"></span> Пл. Александра Невского, от метро: 1000 м</p>
                    <div class="deals-item-description__map">Смотреть на карте<span class="i-icons i-map"></span></div>
                    <p><strong>120м<sup>2</sup></strong>, <strong>2 000</strong> руб./ час</p>
                </div>
            </div>
            <div class="deals-item">
                <div class="b-star i-shadow"><span class="i-icons i-star"></span></div>
                <img src="images/thumb-2.jpg">
                <div class="deals-item-description">
                    <a href="#" class="deals-item-description__address">Ул. Диктатуры Пролетариата, д.12, корп. 3</a>
                    <p><span class="i-icons i-metro_orange"></span> Пл. Александра Невского, от метро: 1000 м</p>
                    <div class="deals-item-description__map">Смотреть на карте<span class="i-icons i-map"></span></div>
                    <p><strong>120м<sup>2</sup></strong>, <strong>2 000</strong> руб./ час</p>
                </div>
            </div>
            <div class="deals-item">
                <div class="b-star i-shadow"><span class="i-icons i-star"></span></div>
                <img src="images/thumb-1.jpg">
                <div class="deals-item-description">
                    <a href="#" class="deals-item-description__address">Ул. Лизы Чайкиной, д.67</a>
                    <p><span class="i-icons i-metro_green"></span> Пл. Александра Невского, от метро: 1000 м</p>
                    <div class="deals-item-description__map">Смотреть на карте<span class="i-icons i-map"></span></div>
                    <p><strong>120м<sup>2</sup></strong>, <strong>2 000</strong> руб./ час</p>
                </div>
            </div>
            <div class="deals-item">
                <div class="b-star i-shadow"><span class="i-icons i-star"></span></div>
                <img src="images/thumb-2.jpg">
                <div class="deals-item-description">
                    <a href="#" class="deals-item-description__address">Ул. Диктатуры Пролетариата, д.12, корп. 3</a>
                    <p><span class="i-icons i-metro_orange"></span> Пл. Александра Невского, от метро: 1000 м</p>
                    <div class="deals-item-description__map">Смотреть на карте<span class="i-icons i-map"></span></div>
                    <p><strong>120м<sup>2</sup></strong>, <strong>2 000</strong> руб./ час</p>
                </div>
            </div>
            <div class="deals-item">
                <div class="b-star i-shadow"><span class="i-icons i-star"></span></div>
                <img src="images/thumb-3.jpg">
                <div class="deals-item-description">
                    <a href="#" class="deals-item-description__address">Ул. Диктатуры Пролетариата, д.12</a>
                    <p><span class="i-icons i-metro_red"></span> Технологический институт, от метро: 1020 м</p>
                    <div class="deals-item-description__map">Смотреть на карте<span class="i-icons i-map"></span></div>
                    <p><strong>120м<sup>2</sup></strong>, <strong>2 000</strong> руб./ час</p>
                </div>
            </div>
            <div class="deals-item">
                <div class="b-star i-shadow"><span class="i-icons i-star"></span></div>
                <img src="images/thumb-4.jpg">
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
