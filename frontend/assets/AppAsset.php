<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web/template/site';
    public $css = [
        'css/reset.css',
        'css/style.css',
    ];
    public $js = [
        'js/style.js',
    ];
    public $depends = [
        'frontend\assets\Html5ShivAsset',
        'frontend\assets\RespondAsset',
        'frontend\assets\DadataAsset',
        'yii\web\YiiAsset',
    ];
}