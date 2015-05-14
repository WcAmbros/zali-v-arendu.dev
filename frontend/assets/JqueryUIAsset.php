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

class JqueryUIAsset extends AssetBundle{
    public $sourcePath = '@bower/jquery-ui';
    public $js = [
        'jquery-ui.js',
    ];
    public $jsOptions = [
        'position' => View::POS_HEAD,
    ];
}