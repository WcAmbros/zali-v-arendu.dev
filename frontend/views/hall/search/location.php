<?php
/**
 * Created by PhpStorm.
 * Date: 29.06.2015
 *
 * @author Zakharov Stanislav <zahs88@gmail.com>
 *
 * @var array $post
 * @var array $category
 * @var array $district
 * @var array $metro
 */

use yii\helpers\ArrayHelper;
use yii\helpers\Html;

$search=$post['Search'];
?>
<div class="result-find-location">
    <?php if(isset($post['Order'])){
        foreach($post['Order'] as $order=>$value){
            print "<input type='hidden' id='order_{$order}' name='Order[{$order}]' value='{$value}'>\n";
        }
    }?>
    <div class="result-find-location__header">Вы искали</div>
    <fieldset>
        <label class="result-find-location-item">
            <span class="result-find-location-item__header">Вид зала:</span>
            <select name="Search[category]" class="result-find-location-item__select">
                <option value="">Не выбрано</option>
                <?= Html::renderSelectOptions($search['category'], ArrayHelper::map($category, 'name', 'name')); ?>
            </select>
        </label>
        <label class="find-location-item">
            <span class="result-find-location-item__header">Станция метро:</span>
            <select name="Search[metro]" class="result-find-location-item__select">
                <option value="">Не выбран</option>
                <?= Html::renderSelectOptions($search['metro'], ArrayHelper::map($metro, 'name', 'name')); ?>
            </select>
        </label>
        <label class="result-find-location-item">

            <span class="result-find-location-item__header">Район города:</span>
            <select name="Search[district]" class="result-find-location-item__select">
                <option value="">Не выбран</option>
                <?= Html::renderSelectOptions($search['district'], ArrayHelper::map($district, 'name', 'name','f_category')); ?>
            </select>
        </label>
    </fieldset>
    <button class="result-find__button"><span class="i-icons i-search"></span>Найти</button>
</div>