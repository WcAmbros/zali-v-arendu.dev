<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $user common\models\User */

$confirmLink = Yii::$app->urlManager->createAbsoluteUrl(['user/confirm-email', 'token' => $user->email_confirm_token]);
?>

<p>Здравствуйте, <?= Html::encode($user->username) ?>!</p>

<p>Для подтверждения адреса пройдите по ссылке: <?= Html::a(Html::encode($confirmLink), $confirmLink) ?></p>

<p>Если Вы не регистрировались на нашем сайте, то просто удалите это письмо.</p>