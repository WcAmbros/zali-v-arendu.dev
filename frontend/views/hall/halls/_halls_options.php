<?php
/**
 * Created by PhpStorm.
 * Date: 19.06.2015
 *
 * @author Zakharov Stanislav <zahs88@gmail.com>
 *
 * @var \common\models\Hall[] $models
 * @var array $options
 * @var \yii\data\Pagination $pages
 *
 * @var int $options ['max'] - align justify in line. Create additional empty block
 */


$one_seat_for_a_btn_next=0;
if(isset($options['btn_next'])&&isset($pages->links['next'])){
    $one_seat_for_a_btn_next=1;
    print("<div class='deals-item'><a href='{$pages->links['next']}'><img src='/images/hall/btn_next.jpg'></a></div>\n");
}

if (isset($options['max'])) {
    $different = abs(count($models) % $options['max'] - $options['max'])-$one_seat_for_a_btn_next;//-1 - место для кнопки "Далее"
    for ($i = 0; $i < $different; $i++)
        print("<div class='deals-item'></div>\n");
}

if (isset($options['deals.all'])) {
    print(
    "<div class='deals__more'>
                    <a href='/hall/all' class='deals__more-link' >Все предложения города</a>
                </div>\n");
}


