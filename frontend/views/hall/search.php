<?php
/**
 * @var $this yii\web\View
 * @var array $search
 * @var array $models
 * @var \frontend\models\Hall $model
 * @var \yii\data\Pagination $pages
 */

use \yii\widgets\LinkPager;
$this->title = 'Результаты поиска';
?>

<div class="result">
    <form class="result-find" action="/hall/search">
        <div class="result-find-location">
            <div class="result-find-location__header">Вы искали</div>
            <fieldset>
                <label class="result-find-location-item">
                    <span  class="result-find-location-item__header">Вид зала:</span>
                    <select class="result-find-location-item__select">
                        <option>P</option>
                    </select>
                </label>
                <label class="result-find-location-item">
                    <span class="result-find-location-item__header">Район города:</span>
                    <select class="result-find-location-item__select">
                        <option>Красногвардейский</option>
                    </select>
                </label>
                <label class="find-location-item">
                    <span class="result-find-location-item__header">Станция метро:</span>
                    <select class="result-find-location-item__select">
                        <option>Технологический институт</option>
                    </select>
                </label>
            </fieldset>
            <button class="result-find__button"><span class="i-icons i-search"></span>Найти</button>
        </div>
        <div class="result-find-params">
            <div class="result-find-params__header">Параметры</div>
            <div>
<!--                <label>-->
<!--                    <input type="checkbox">-->
<!--                    <span>Площадь зала:</span>-->
<!--                </label>-->
<!--                <label>-->
<!--                    от <input> до <input> м<sup>2</sup>-->
<!--                </label>-->
            </div>
        </div>
    </form>

    <div class="result-content">
        <div class="result-content-header"><?php echo $search['purpose'];?> <span class="result-content-header__span">(<?php echo count($models);?> найдено)</span></div>
        <div class="result-content-sort">
            Сортировать: <span class="result-content-sort__select" >по цене за м<sup>2</sup></span>
        </div>
        <div class="deals result-content-deals">
            <div class="deals-content">
                <?php
                    foreach($models as $model){
                        $images=null;
                        if(!is_null($model->attribs))
                            $images=json_decode($model->attribs)->images;
                        print "
                            <div class='deals-item'>
                                <div class='b-star i-shadow'><span class='i-icons i-star'></span></div>
                                <a href='/hall/$item->id'><img src='/{$images[0]->slide}'></a>
                                <div class='deals-item-description'>
                                    <a href='/hall/$item->id' class='deals-item-description__address'>$item->name</a>
                                    <p><span class='i-icons i-metro_red'></span> {$model->address->comment}</p>
                                    <div class='deals-item-description__map'>Смотреть на карте<span class='i-icons i-map'></span></div>
                                    <p><strong>$item->square</strong> м<sup>2</sup>, <strong>{$model->price->min}</strong> руб./ час</p>
                                </div>
                            </div>\n";
                    }
                ?>
            </div>
        </div>
        <div class="pagination">
            <?php

            echo LinkPager::widget([
                'pagination' => $pages,
                'nextPageLabel'=>'Дальше →',
                'prevPageLabel'=>'Назад',
                'firstPageCssClass'=>'pagination-pages-item__first',
                'lastPageCssClass'=>'pagination-pages-item__last',
                'prevPageCssClass'=>'pagination-pages-item__prev',
                'nextPageCssClass'=>'pagination-pages-item__next',
                'activePageCssClass'=>'pagination-pages-item_active',
                'disabledPageCssClass'=>'pagination-pages-item_disabled',
                'options'=>[
                    'class'=>'pagination-pages'
                ],
                'linkOptions'=>[
                    'class'=>'pagination-pages-item__link'
                ],
                'maxButtonCount' =>5

            ]);
            ?>
            <div class="pagination-status">
                <?php
                $item=($pages->page!=0)?$pages->page*$pages->pageSize:$pages->page+1;
                $item_next=($pages->page+1)*$pages->pageSize;
                $item_total=$pages->totalCount;
                echo "$item-$item_next из $item_total";?>
            </div>
        </div>

    </div>
</div>