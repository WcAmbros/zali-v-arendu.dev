<?php

$region = Yii::$app->region->currentRegion();
$list = Yii::$app->region->find()->all();

?>
<div class="dropdown">
    В городе:
    <div class="dropdown__content">
        <div><span
                class="header-content-town__label"><?= is_null($region) ? "Санкт-Петербург" : $region->name; ?></span>
        </div>
        <ul class="dropdown-list">
            <?php
            foreach ($list as $item) {
                print "<li><a href='http://$item->subdomain.zali-v-arendu.dev'>$item->name</a></li>";
            }
            ?>
        </ul>
    </div>

</div>


