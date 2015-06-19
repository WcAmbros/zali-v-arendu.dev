<?php
/**
 * @var $this yii\web\View
 * @var \common\models\Floor[] $floor
 * @var \common\models\Category[] $category
 * @var \common\models\Options[] $options
 * @var \common\models\Metro[] $metro
 * @var \common\models\District[] $district
 * @var \common\models\Town[] $town
 */

use yii\widgets\ActiveForm;

?>

<div class="modal-hall">
    <div class="modal-hall-background"></div>
<!--    <form class="modal-hall-form" action="--><?//= (Url::toRoute('hall/create')) ?><!--" method="post"enctype="multipart/form-data">-->
        <?php

        $form =ActiveForm::begin([
            'options'=>[
                'class'=>'modal-hall-form',
                'enctype'=>'multipart/form-data'
            ]
        ]);
        ?>
        <div class="modal-hall-form__header">Добавить зал в базу <span class="modal-hall-form__close i-close i-icons"
                                                                       onclick="button.close('.modal-hall')"></span>
        </div>
        <?= $this->render('_form', [
            'model' => $model,
            'form'=>$form,
            'floor' => $floor,
            'town' => $town,
            'options' => $options,
            'category' => $category,
            'district' => $district,
            'metro' => $metro,
        ]) ?>

        <?php $form = ActiveForm::end(); ?>

</div>