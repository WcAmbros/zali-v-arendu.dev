<?php
/**
 * @var $this yii\web\View
 * @var array $search
 * @var array $models
 * @var array $category
 * @var array $district
 * @var array $metro
 * @var \frontend\models\Hall $model
 * @var \yii\data\Pagination $pages
 */

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Результаты поиска';

/*
function getAutoComplete_config($collection,$name,$value){
    $list=array();
    foreach($collection as $item){
        $list[]=$item->name;
    };
    $config=[
        'name' => $name,
        'value' => $value,
        'options'=>[
            'class'=>'result-find-location-item__input'
        ],
        'clientOptions' => [
            'source' => $list
        ]
    ];

    return $config;
}
$district = getAutoComplete_config($district,'Search[district]',$search['district']);
$metro_list = getAutoComplete_config($metro,'Search[metro]',$search['metro']);
*/


?>

<div class="result">
    <form class="result-find" action="<?=(Url::toRoute('hall/search'))?>" method="post">
        <div class="result-find-location">
            <input type="hidden" name="_csrf" value="<?=Yii::$app->request->getCsrfToken()?>" />
            <div class="result-find-location__header">Вы искали</div>
            <fieldset>
                <label class="result-find-location-item">
                    <span  class="result-find-location-item__header">Вид зала:</span>
                    <select name="Search[category]" class="result-find-location-item__select">
                        <option value="">Не выбрано</option>
                        <?= Html::renderSelectOptions($search['category'],ArrayHelper::map($category,'name','name'));?>
                    </select>
                </label>
                <label class="result-find-location-item">

                    <span class="result-find-location-item__header">Район города:</span>
                    <select name="Search[district]" class="result-find-location-item__select">
                        <option value="">Не выбрано</option>
                        <?= Html::renderSelectOptions($search['district'],ArrayHelper::map($district,'name','name'));?>
                        <?php
                        //                        AutoComplete::widget($district);
                        ?>
                    </select>
                </label>
                <label class="find-location-item">
                    <span class="result-find-location-item__header">Станция метро:</span>
                    <select name="Search[metro]" class="result-find-location-item__select">
                        <option value="">Не выбрано</option>
                        <?= Html::renderSelectOptions($search['metro'],ArrayHelper::map($metro,'name','name'));?>

                        <?php
                        //                        AutoComplete::widget($metro_list);
                        ?>
                    </select>
                </label>
            </fieldset>
            <button class="result-find__button"><span class="i-icons i-search"></span>Найти</button>
        </div>
        <div class="result-find-params">
            <div class="result-find-params__header">Параметры</div>
            <div>
<!--                <label>-->
<!--                    <input type="checkbox">-->
<!--                    <span>Площадь зала:</span>-->
<!--                </label>-->
<!--                <label>-->
<!--                    от <input> до <input> м<sup>2</sup>-->
<!--                </label>-->
            </div>
        </div>
    </form>

    <div class="result-content">
        <div class="result-content-header"><?php echo ($search['category']=="")?$this->title:$search['category'];?> <span class="result-content-header__span">(<?php echo $pages->totalCount;?> найдено)</span></div>
        <div class="result-content-sort">
            Сортировать: <span class="result-content-sort__select" >по цене за м<sup>2</sup></span>
        </div>
        <?= $this->render('_halls',[
            'models'=>$models,
            'metro'=>$metro,
            'options'=>[
                'max'=>3,
                'class'=>'result-content-deals'
            ],
        ]);
        ?>
        <div class="pagination">
            <?=$this->render('_pagination',['pages'=>$pages])?>
        </div>

    </div>
</div>