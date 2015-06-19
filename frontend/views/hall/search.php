<?php
/**
 * @var $this yii\web\View
 * @var array $post
 * @var array $models
 * @var array $category
 * @var array $district
 * @var array $metro
 * @var \common\models\Hall $model
 * @var \yii\data\Pagination $pages
 */

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Результаты поиска';

$search=$post['Search'];
?>

<div class="result">
    <form class="result-find" action="<?= (Url::toRoute('hall/search')) ?>" method="post">
        <div class="result-find-location">
            <input type="hidden" name="_csrf" value="<?= Yii::$app->request->getCsrfToken() ?>"/>
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
                        <?= Html::renderSelectOptions($search['district'], ArrayHelper::map($district, 'name', 'name')); ?>
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
        <div
            class="result-content-header"><?php echo ($search['category'] == "") ? $this->title : $search['category']; ?>
            <span class="result-content-header__span">(<?php echo $pages->totalCount; ?> найдено)</span></div>
        <div class="result-content-sort">

            Сортировать: <div class="result-content-sort__select">
                <span class="result-content-sort__value" order="<?=(isset($post['Order']))?array_keys($post['Order'])[0]:"";?>"></span>
                <ul class="result-content-sort__list">
                    <li name="default"></li>
                    <li name="price">по цене за м<sup>2</sup></li>
                </ul>
            </div>
        </div>
        <?= $this->render('halls/_halls', [
            'models' => $models,
            'metro' => $metro,
            'pages' => $pages,
            'options' => [
                'btn_next'=>1,
                'max' => 3
            ],
        ]);


        ?>
        <div class="pagination">
            <?= $this->render('_pagination', ['pages' => $pages]) ?>
        </div>

    </div>
</div>