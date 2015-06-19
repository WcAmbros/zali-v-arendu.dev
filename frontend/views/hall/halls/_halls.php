<?php

/**
 * @var \common\models\Hall[] $models
 * @var \common\models\Metro[] $metro
 * @var array $options
 *
 * @var \yii\data\Pagination $pages
 *
 *
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
        ?>

        <?= $this->render('_halls_options', [
            'models' => $models,
            'pages' => (isset($pages))?$pages:null,
            'options' => $options,
        ]);?>

    </div>
</div>
