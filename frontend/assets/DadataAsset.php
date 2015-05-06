<?php
/**
 * Created by PhpStorm.
 * User: sz
 * Date: 06.05.2015
 * Time: 14:19
 */

namespace frontend\assets;
use yii\web\AssetBundle;

class DadataAsset extends AssetBundle{
    public $css = [
        'https://dadata.ru/static/css/lib/suggestions-15.2.css',
    ];
    public $js = [
        'https://dadata.ru/static/js/lib/jquery.suggestions-15.2.min.js',
    ];
}