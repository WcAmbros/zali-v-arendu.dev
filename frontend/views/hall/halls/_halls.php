<?php

/**
 * @var \common\models\Hall[] $models
 * @var \common\models\Metro[] $metro
 * @var $this yii\web\View
 * @var \yii\data\Pagination $pages
 *
 * @var array $options
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
        if(empty($models)){
            echo $this->render('_halls__noitems');
        }
        ?>

        <?= $this->render('_halls_options', [
            'models' => $models,
            'pages' => (isset($pages))?$pages:null,
            'options' => $options,
        ]);?>

    </div>
</div>
