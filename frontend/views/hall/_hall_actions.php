<?php

/**
 * @var \frontend\models\Hall $model
 */
?>

<div class="hall-actions">
    <ul>
        <li> <a href="#" class="btn-update" onclick="button.update('/hall/update/<?=$model->id?>');">Редактировать</a></li>
        <li> <a href="/hall/delete/<?=$model->id?>">Удалить</a></li>
    </ul>
</div>