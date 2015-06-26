<?php
/**
 * Created by PhpStorm.
 * User: sz
 * Date: 06.05.2015
 * Time: 14:19
 */

namespace backend\assets;

use yii\web\AssetBundle;
use yii\web\View;

class TestAsset extends AssetBundle
{
    public $baseUrl = '@web';
    public $js = [
        'js/hall.jsx'
    ];
    public $jsOptions = [
        'type'=>'text/jsx',
        'position' => View::POS_HEAD,
    ];
}