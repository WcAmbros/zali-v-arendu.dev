<?php
/**
 * Created by PhpStorm.
 * User: sz
 * Date: 06.05.2015
 * Time: 14:19
 */

namespace frontend\assets;

use yii\web\AssetBundle;
use yii\web\View;

class YandexApiAsset extends AssetBundle{
    public $js = [
        'http://api-maps.yandex.ru/2.0-stable/?load=package.standard&lang=ru-RU',
    ];
    public $jsOptions = [
        'position' => View::POS_HEAD,
    ];
}