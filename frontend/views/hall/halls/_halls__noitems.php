<?php
/**
 * Created by PhpStorm.
 * Date: 19.06.2015
 *
 * @author Zakharov Stanislav <zahs88@gmail.com>
 */

$results=Yii::$app->session->get('no_items');
$search=Yii::$app->session->get('search')['Search'];
?>

<p>по Вашему запросу ничего не найдено</p>
<?php
    foreach($results as $key=>$item){
        if($key=='district'&&$item)
            echo "<div><p>Найдены похожие записи в районе города <strong>{$search[$key]}</strong>
                <a class='search-halls' href='/hall/search' data-name='Search[{$key}]' data-value='$search[$key]'>($item записей)</a></p></div>";
    }
?>


