<?php

/**
 * @var \yii\data\Pagination $pages
 */

use yii\widgets\LinkPager;

echo LinkPager::widget([
    'pagination' => $pages,
    'nextPageLabel' => 'Дальше →',
    'prevPageLabel' => 'Назад',
    'firstPageCssClass' => 'pagination-pages-item__first',
    'lastPageCssClass' => 'pagination-pages-item__last',
    'prevPageCssClass' => 'pagination-pages-item__prev',
    'nextPageCssClass' => 'pagination-pages-item__next',
    'activePageCssClass' => 'pagination-pages-item_active',
    'disabledPageCssClass' => 'pagination-pages-item_disabled',
    'options' => [
        'class' => 'pagination-pages'
    ],
    'linkOptions' => [
        'class' => 'pagination-pages-item__link'
    ],
    'maxButtonCount' => 5

]);
?>

<div class="pagination-status">
    <?php
    $model = ($pages->page != 0) ? $pages->page * $pages->pageSize : $pages->page + 1;
    $model_next = ($pages->page + 1) * $pages->pageSize;
    $model_total = $pages->totalCount;
    echo "$model-$model_next из $model_total"; ?>
</div>