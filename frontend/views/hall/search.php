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

use yii\helpers\Url;

$this->title = 'Результаты поиска';

$search=$post['Search'];
?>

<div class="result">
    <form class="result-find" action="<?= (Url::toRoute('hall/search')) ?>" method="post">
        <input type="hidden" name="_csrf" value="<?= Yii::$app->request->getCsrfToken() ?>"/>
        <?=$this->render('search/location',[
            'post'=>$post,
            'category'=>$category,
            'metro'=>$metro,
            'district'=>$district,
        ]);?>
        <?=$this->render('search/params',[]);?>
    </form>

    <div class="result-content">
        <div class="result-content-header"><?php echo ($search['category'] == "") ? $this->title : $search['category']; ?>
            <span class="result-content-header__span">(<?php echo $pages->totalCount; ?> найдено)</span>
        </div>

        <?=$this->render('search/sort',['post'=>$post]);?>

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
            <?= $this->render('search/pagination', ['pages' => $pages]) ?>
        </div>

    </div>
</div>