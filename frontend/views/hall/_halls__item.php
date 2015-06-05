<?php

/**
 * @var \frontend\models\Hall $model
 * @var array $metro
 * @var \frontend\models\Metro $metro_item
 * @var \frontend\models\Metro $metro_current
 */

use yii\helpers\Url;

$images=null;
$geocode=null;
$metro_current=null;
if(!is_null($model->attribs)){
    $attribs=json_decode($model->attribs);
    $images=$attribs->images;
    $geocode=$attribs->geocode;
}
    foreach($metro as $metro_item){
        if($metro_item->name==$model->address->metro){
            $metro_current=$metro_item;//json_decode($metro_item->attribs)->options->class;
        }
    }


?>

<div class='deals-item'>
    <?=($model->favourite)?"<div class='b-star i-shadow'><span class='i-icons i-star'></span></div>":""?>
    <a href='<?=(Url::toRoute(['hall/view','id'=>$model->id]))?>'><img src='/<?=$images[0]->slide;?>'></a>
    <div class='deals-item-description'>
        <a href='<?=(Url::toRoute(['hall/view','id'=>$model->id]))?>' class='deals-item-description__address'><?=$model->name;?></a>
        <p>
            <?php
                if(!is_null($metro_current)){
                    $class=json_decode($metro_current->attribs)->options->class;
                    echo "<span class='i-icons $class'></span> $metro_current->name, ";
                }
            ?>
            <?=$model->address->comment;?>
        </p>
        <div class='deals-item-description__map'>
            <a href='#map_<?=$model->id;?>' geoname='<?=$model->name;?>' geocode='<?=$geocode;?>' class='ymap'>
                Смотреть на карте<span class='i-icons i-map'></span>
            </a>
        </div>
        <p><strong><?=$model->square;?></strong> м<sup>2</sup>, <strong><?=$model->price->min;?></strong> руб./ час</p>
        <div id='map_<?=$model->id;?>' style='width: 700px; height: 400px;display: none; '></div>
    </div>
</div>

