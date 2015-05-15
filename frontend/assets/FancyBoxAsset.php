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

class FancyBoxAsset extends AssetBundle{
    public $baseUrl = '@web/template/site/js/fancybox';
    public $js = [
        'jquery.fancybox.pack.js',
        'helpers/jquery.fancybox-media.js',
        'helpers/jquery.fancybox-thumbs.js',
    ];

    public $jsOptions = [
        'position' => View::POS_HEAD,
    ];
    public $css = [
        'jquery.fancybox.css',
        'helpers/jquery.fancybox-media.css',
        'helpers/jquery.fancybox-thumbs.css',
    ];

    public $cssOptions = [
        'position' => View::POS_HEAD,
    ];
}