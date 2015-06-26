<?php
use yii\helpers\Url;

$login = Url::toRoute('user/login');
$logout = Url::toRoute('user/logout');
$signup = Url::toRoute('user/signup');

if (Yii::$app->user->isGuest) {
    echo "<a class='login' href='$login'>Войти</a> / <a class='signup' href='$signup'>Зарегистрироваться</a>";
} else {
    $icon = '';
    $username = Yii::$app->user->identity->username;
    $profiles = Yii::$app->user->identity->profiles;
    if (!empty($profiles)) {
        $profile=$profiles[0];
        $username = $profile->name;
        $icon = '<img src="/' . $profile->images . '" class="header-content-user__icon">';
    }
    echo "Привет, <span class='header-content-user__label'>$username!</span>
                $icon
                <ul class='user-actions'>
                    <li><a href='/profile' title='Редактирование профиля'>Профиль</a> </li>
                    <li><a href='#' title='Отображает список введенных залов'>Список залов</a> </li>
                    <li><a data-method='post' title='Выход из системы' href='$logout'>Выход</a></li>
                </ul>
                ";
}
?>




