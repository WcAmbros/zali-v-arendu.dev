<?php
use yii\helpers\Url;

if (!Yii::$app->user->isGuest) {
    $route = '/profile';
    $username = Yii::$app->user->identity->username;
    $icon = '';
    $profile = Yii::$app->profile->findOne(['user_id' => Yii::$app->user->id]);// плохо - переделать
    if (!is_null($profile)) {
        $route = '/profile/' . $profile->id;
        $username = $profile->name;
        $icon = '<img src="/' . $profile->images . '" class="header-content-user__icon">';
    }

}
$login = Url::toRoute('user/login');
$logout = Url::toRoute('user/logout');
$signup = Url::toRoute('user/signup');

if (Yii::$app->user->isGuest) {
    echo '<a href="' . $login . '">Войти</a> / <a href="' . $signup . '">Зарегистрироваться</a>';
} else {
    echo "Привет, <a href='$route' class='header-content-user__label'>$username!</a>
                $icon
                <ul class='user-actions'>
                    <li><a href='#' title='Отображает список введенных залов'>Список залов</a> </li>
                    <li><a data-method='post' title='Выход из системы' href='$logout'>Выход</a></li>
                </ul>
                ";
}
?>




