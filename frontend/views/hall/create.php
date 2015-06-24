<?php
/**
 * @var $this yii\web\View
 * @var array $params
 * @var \common\models\Hall $model
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
        <?= $this->render('_form', array_merge(['model' => $model,'form'=>$form,],$params)) ?>

        <?php $form = ActiveForm::end(); ?>

</div>