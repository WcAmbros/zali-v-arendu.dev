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

class ReactJsAsset extends AssetBundle
{
    public $sourcePath = '@bower/react';
    public $js = [
        'react.js',
        'react-with-addons.js',
        'JSXTransformer.js',
    ];
    public $jsOptions = [
        'position' => View::POS_HEAD,
    ];
}