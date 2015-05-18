<?php
/**
 * @var $this yii\web\View
 * @var array $search
 * @var array $models
 * @var array $purpose
 * @var array $district
 * @var array $metro
 * @var \frontend\models\Hall $model
 * @var \yii\data\Pagination $pages
 */
use yii\jui\AutoComplete;
use \yii\widgets\LinkPager;
$this->title = 'Результаты поиска';

function getAutoComplete_config($collection,$name,$value){
    $list=array();
    foreach($collection as $item){
        $list[]=$item->name;
    };
    $config=[
        'name' => $name,
        'value' => $value,
        'options'=>[
            'class'=>'result-find-location-item__select'
        ],
        'clientOptions' => [
            'source' => $list
        ]
    ];

    return $config;
}
$district = getAutoComplete_config($district,'Search[district]',$search['district']);
$metro = getAutoComplete_config($metro,'Search[metro]',$search['metro']);
$search_purpose = getAutoComplete_config($purpose,'Search[purpose]',$search['purpose']);
?>

<div class="result">
    <form class="result-find" action="/hall/search" method="post">
        <div class="result-find-location">
            <input type="hidden" name="_csrf" value="<?=Yii::$app->request->getCsrfToken()?>" />
            <div class="result-find-location__header">Вы искали</div>
            <fieldset>
                <label class="result-find-location-item">
                    <span  class="result-find-location-item__header">Вид зала:</span>
                    <?php
                    echo AutoComplete::widget($search_purpose);
                    ?>
                </label>
                <label class="result-find-location-item">
                    <span class="result-find-location-item__header">Район города:</span>
                    <?php
                    echo AutoComplete::widget($district);
                    ?>
                </label>
                <label class="find-location-item">
                    <span class="result-find-location-item__header">Станция метро:</span>
                    <?php
                        echo AutoComplete::widget($metro);
                    ?>
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
                        $geocode=null;
                        if(!is_null($model->attribs)){
                            $images=json_decode($model->attribs)->images;
                            $geocode=json_decode($model->attribs)->geocode;
                        }
                        print "
                            <div class='deals-item'>
                                <div class='b-star i-shadow'><span class='i-icons i-star'></span></div>
                                <a href='/hall/$model->id'><img src='/{$images[0]->slide}'></a>
                                <div class='deals-item-description'>
                                    <a href='/hall/$model->id' class='deals-item-description__address'>$model->name</a>
                                    <p><span class='i-icons i-metro_red'></span> {$model->address->comment}</p>
                                    <div class='deals-item-description__map'>
                                        <a href='#map_$model->id' geoname='$model->name' geocode='$geocode' class='ymap'>
                                            Смотреть на карте<span class='i-icons i-map'></span>
                                        </a>
                                    </div>
                                    <p><strong>$model->square</strong> м<sup>2</sup>, <strong>{$model->price->min}</strong> руб./ час</p>
                                    <div id='map_$model->id' style='width: 700px; height: 400px;display: none; '></div>
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
                $model=($pages->page!=0)?$pages->page*$pages->pageSize:$pages->page+1;
                $model_next=($pages->page+1)*$pages->pageSize;
                $model_total=$pages->totalCount;
                echo "$model-$model_next из $model_total";?>
            </div>
        </div>

    </div>
</div>