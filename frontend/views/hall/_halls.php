<?php

/**
 * @var array $models
 * @var array $metro
 * @var array $options
 * @var int $options['max'] - align justify in line, create additional empty block
 * @var string $options['title'] - title for halls
 */

if(!isset($options['class']))
    $options['class']="";
?>
<div class="deals <?=$options['class'];?>">
    <?php
        if(isset($options['title']))
            print("<div class='deals__header'>{$options['title']}</div>\n");
    ?>
    <div class="deals-content">
        <?php
        foreach($models as $model){
            echo $this->render('_halls__item',['model'=>$model,'metro'=>$metro]);
        }

        if(isset($options['max'])){
            $different=abs(count($models)%$options['max']-$options['max']);
            for($i=0;$i<$different;$i++)
                print("<div class='deals-item'></div>\n");
        }

        if(isset($options['deals.all'])){
                print(
                "<div class='deals__more'>
                    <a href='/hall/all' >Все предложения города</a>
                </div>\n");
        }
        ?>

    </div>
</div>
