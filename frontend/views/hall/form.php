<?php
/**
 * @var $this yii\web\View
 * @var array $floor
 * @var array $category
 * @var array $options
 * @var array $metro
 * @var array $district
 */

use yii\helpers\Url;

?>

<div class="modal-hall">
    <div class="modal-hall-background"></div>
    <form class="modal-hall-form" action="<?=(Url::toRoute('hall/create'))?>" method="post" enctype="multipart/form-data">
        <div class="modal-hall-form__header">Добавить зал в базу <span class="modal-hall-form__close i-close i-icons" onclick="button.close('.modal-hall')"></span></div>
        <?=$this->render('_form',[
            'model' => $model,
            'floor'=>$floor,
            'options'=>$options,
            'category'=>$category,
            'district'=>$district,
            'metro'=>$metro,
        ])?>
        <button class="modal-hall__button"><span class="i-icons i-add"></span> Добавить зал в базу</button>
    </form>
</div>