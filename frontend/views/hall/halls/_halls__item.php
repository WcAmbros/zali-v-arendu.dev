<?php

/**
 * @var \common\models\Hall $model
 * @var \common\models\Metro[] $metro

 */

use yii\helpers\Url;

$images = null;
$geocode = null;
$metro_current = null;
if (!is_null($model->attribs)) {
    $attribs = json_decode($model->attribs);
    $images = $attribs->images;
    $geocode = $attribs->geocode;
}
foreach ($metro as $item) {
    if ($item->name == $model->address->metro) {
        $metro_current = $item;
    }
}


?>

<div class='deals-item'>
    <?= ($model->favourite) ? "<div class='b-star i-shadow'><span class='i-icons i-star'></span></div>" : "" ?>
    <a href='<?= (Url::toRoute(['hall/view', 'category' => $model->category->alias,'hall'=>$model->alias])) ?>'><img
            src='/<?= (isset($images[0])) ? $images[0]->slide : "uploads/noimage.jpg" ?>'></a>

    <div class='deals-item-description'>
        <a href='<?= (Url::toRoute(['hall/view', 'category' => $model->category->alias,'hall'=>$model->alias])) ?>'
           class='deals-item-description__address'><?= $model->name; ?></a>

        <p class="size-small">
            <?php
            if (!is_null($metro_current)) {
                $class = json_decode($metro_current->attribs)->options->class;
                echo "<span class='i-icons $class'></span> $metro_current->name, ";
            }
            ?>
            <?= $model->address->comment; ?>
        </p>

        <div class='deals-item-description__map'>
            <a href='#map_<?= $model->id; ?>' geoname='<?= $model->name; ?>' geocode='<?= $geocode; ?>' class='ymap size-small'>
                cмотреть на карте<span class='i-icons i-map'></span>
            </a>
        </div>
        <p class="deals-item__price"><strong><?= $model->square; ?></strong> м<sup>2</sup>, <strong><?= $model->price->min; ?></strong> руб./ час
        </p>

        <div id='map_<?= $model->id; ?>' style='width: 700px; height: 400px;display: none; '></div>
    </div>
</div>

