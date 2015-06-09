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

class Html5ShivAsset extends AssetBundle
{
    public $sourcePath = '@bower/html5shiv/dist';
    public $js = [
        'html5shiv.min.js',
    ];
    public $jsOptions = [
        'condition' => 'lt IE 9',
        'position' => View::POS_HEAD,
    ];
}