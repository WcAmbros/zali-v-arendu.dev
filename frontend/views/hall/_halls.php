<?php

/**
 * @var \common\models\Hall[] $models
 * @var \common\models\Metro[] $metro
 * @var array $options
 * @var \yii\data\Pagination $pages
 *
 *
 * @var int $options ['max'] - align justify in line. Create additional empty block
 * @var string $options ['title'] - title for halls
 */

?>
<div class="deals">
    <?php
    if (isset($options['title']))
        print("<div class='deals__header'>{$options['title']}</div>\n");
    ?>
    <div class="deals-content">
        <?php
        foreach ($models as $model) {
            echo $this->render('_halls__item', ['model' => $model, 'metro' => $metro]);
        }

        $one_seat_for_a_btn_next=0;
        if(isset($options['btn_next'])&&$pages->totalCount>$pages->limit){
            $one_seat_for_a_btn_next=1;
            $url=(isset($pages->links['next']))?$pages->links['next']:$pages->links['self'];
            print("<div class='deals-item'><a href='{$url}'><img src='/images/hall/btn_next.jpg'></a></div>\n");
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
        ?>

    </div>
</div>
