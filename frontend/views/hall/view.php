<?php
/**
 * @var $this yii\web\View
 *
 * @var \frontend\models\Hall $model
 */
use yii\helpers\Html;
$this->title = $model->name;

$images=json_decode($model->attribs)->images;
$price=$model->getPrice()->all();
$address=$model->getAddress()->all();
$purpose=$model->getPurpose()->all();
$equipment=$model->getEquipment()->all();
$floor=$model->getFloor()->all();
$agent=$model->getAgent()->all();

?>

<div class="return_to_search">
    <span class="i-icons i-arrow"></span>
    <a href="/" class="return_to_search__link">Назад к поиску</a>
</div>
<div class="hall">
    <h1 class="hall__header"><?php echo $model->name;?></h1>
    <div class="hall__caption"><?php echo $purpose[0]->attributes['name'];?></div>
    <div class="hall-content">


        <div class="hall-content-slider">
            <a href="#" class="hall-content-slider-main"><img src="/<?php echo $images[0]->slide;?>"></a>
            <div class="hall-content-slider-thumnails">
                <?php
                    foreach($images as $image)
                        print (Html::a("<img src='/$image->thumbnail'>","/$image->slide",['class' => 'hall-content-slider-thumbnails-link']))."\n";
              ?>

            </div>
        </div>
        <div class="hall-content-banner">
            <div class="hall-content-banner__example">Реклама</div>
        </div>
        <div>
            <?php
                echo "<p><strong>$model->square</strong> м<sup>2</sup>, <strong>{$price[0]->attributes['min']}</strong> руб./ час</p>"
            ?>
            <p><span class="i-icons i-metro_green"></span> <?php echo $address[0]->attributes['comment']; ?></p>
            <div class="main-deals-item-description__map">Смотреть на карте<span class="i-icons i-map"></span></div>
            <p class="equipment__header">Оборудование зала:</p>
            <ul class="equipment">
                <li>Покрытие: <strong><?php echo $floor[0]->attributes['name']; ?></strong></li>
                <?php
                    foreach($equipment as $item){
                        echo "<li>{$item['name']}: <strong>есть</strong></li>";
                    }
                ?>
            </ul>
            <p>По оценкам ученых, сейчас на Землю ежегодно падают 40-60 тысяч тонн метеоритов и прочего космического мусора, а 4 миллиарда лет тому назад их падало намного больше. Большие споры вызывает марсианский метеорит ALH 84001, обнаруженный в 1984 году в Аллан-Хиллз в Антарктике. </p>
            <p><strong>Контакты:</strong></p>
            <ul class="hall-content-contact">
                <li class="hall-content-contact__line"><a href="#" class="hall-content-contact-link"><span class="i-icons i-phone"></span>Показать номер</a></li>
                <li class="hall-content-contact__line"><a href="mailto:<?php echo $agent[0]->attributes['email'];?>" class="hall-content-contact-link"><span class="i-icons i-mail"></span>Написать владельцу</a></li>
            </ul>
        </div>
    </div>
</div>
<div class="similar">
    <div class="deals">
        <div class="deals__header">Похожие предложения</div>
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
        </div>
        <div class="deals__more">
            <a href="#" >Все предложения города</a>
        </div>
    </div>
</div>
<div></div>