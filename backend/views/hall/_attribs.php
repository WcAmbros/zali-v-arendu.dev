<?php
/**
 * Created by PhpStorm.
 * Date: 11.06.2015
 *
 * @author Zakharov Stanislav <zahs88@gmail.com>
 *
 * @var string $attribs
 */

use yii\helpers\Html;

$images=null;
    $geocode=null;
    $attribs=json_decode($attribs);
    if(isset($attribs->images)){
        foreach($attribs->images as $image){
            print Html::img(Yii::$app->params['frontend']."/".$image->thumbnail)."\n";
        }
    }
?>
