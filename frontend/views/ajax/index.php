<?php
/**
 * @var array|\yii\db\ActiveRecord $list
 * */

$collections=array();

foreach($list as $item){
    $collections[]=array(
        'id'=>$item->attributes['id'],
        'name'=>$item->attributes['name'],
    );
}
echo json_encode($collections);