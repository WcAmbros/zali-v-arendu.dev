<?php

/* @var $this yii\web\View */
/* @var $user common\models\User */

$resetLink = Yii::$app->urlManager->createAbsoluteUrl(['user/reset-password', 'token' => $user->password_reset_token]);
?>
Здраствуйте <?= $user->username ?>,

Для смены пароля пройдите по ссылке:

<?= $resetLink ?>
