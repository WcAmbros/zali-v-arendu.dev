<?php
namespace frontend\controllers;


use common\models\Category;
use common\models\District;
use common\models\Floor;
use common\models\Hall;
use common\models\Metro;
use common\models\Options;
use common\models\Town;
use frontend\models\HallSearch;
use Yii;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * Hall controller
 */
class HallController extends Controller
{

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['update', 'delete'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['create','form', 'search', 'view', 'all','captcha','category'],
                        'allow' => true,
                    ],
                ],
            ]
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
                'foreColor' => 0x5FA068,
                'fontFile' => '@webroot/template/site/fonts/gotham_pro/GothaProBolIta.ttf',
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actionIndex()
    {
        return $this->goBack();
    }

    /**
     * @inheritdoc
     */
    public function actionView($category,$hall)
    {
        return $this->render('view', [
            'model' => $this->findModelByAlias($category,$hall),
            'metro' => Metro::find()->all(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function actionSearch()
    {
        $post = Yii::$app->request->post();
        if (!empty($post)) {
            Yii::$app->session->set('search', $post);
        }
        $post=ArrayHelper::merge(['Search'=>['category'=>'','district'=>'','metro'=>'']],$post);
        $category= Category::find()->where(['name'=>$post['Search']['category']])->one();
        if(is_null($category)){
            throw new NotFoundHttpException('The requested page does not exist.');
        }else{
            return $this->redirect(['category','alias'=>$category->alias]);
        }
    }

    public function actionCategory($alias){

        $post = Yii::$app->session->get('search');
        $post=ArrayHelper::merge(['Search'=>['category'=>'','district'=>'','metro'=>'']],$post);//Заполняем недостающие поля

        $hall = new HallSearch();
        $query = $hall->search($post);
        $pages = $hall->searchPagination($query);

        $models = $query->offset($pages->offset)->limit($pages->limit)->all();

        if(empty($models)){
            foreach($post['Search'] as $key=>$item){
                $new_search=['category'=>$post['Search']['category']];
                $new_search[$key]=$item;
                $result[$key]=count($hall->search(['Search'=>$new_search])->all());
            }
            Yii::$app->session->set('no_items', $result);
        }
        $category=Category::find()->where(['alias'=>$alias])->one();

        $list=json_decode($category->options,true);
        return $this->render('search', [
            'models' => $models,
            'pages' => $pages,
            'post' => $post,
            'category' => Category::find()->all(),
            'district' => District::findAllDistrict(),
            'metro' => Metro::find()->all(),
            'search_params'=>[
                'square'=>$hall->getParamsSquare($post),
                'price'=>$hall->getParamsPrice($post),
                'floor'=>Floor::find()->all(),
                'options'=>Options::find()->where('id IN ('.implode(',',$list).')')->all(),
            ]
        ]);
    }

    /**
     * @inheritdoc
     */
    public function actionAll()
    {
        Yii::$app->session->set('search', [
            'Search' => [
                'category' => '',
                'district' => '',
                'metro' => '',
            ]
        ]);
        return $this->redirect(['search']);
    }

    /**
     * @inheritdoc
     */
    public function actionCreate()
    {
        $post = Yii::$app->request->post();

        $model = new Hall();
        if ($model->load($post) && $model->save()) {
            return $this->goHome();
        }else{
            return $this->renderAjax('create', [
                'model' => $model,
                'params'=>$this->getParamsArray($model),
            ]);
        }

    }

    /**
     * @inheritdoc
     */
    public function actionUpdate($id)
    {
        /**
         * @var  Hall $model
         */

        $model = $this->findModel($id, Yii::$app->user->id);

        $post = Yii::$app->request->post();
        if ($model->load($post) && $model->save()) {
            return $this->redirect([
                'view',
                'category' => $model->category->alias,
                'hall' => $model->alias,
            ]);
        } else {
            return $this->renderAjax('update', [
                'model' => $model,
                'params'=>$this->getParamsArray($model),
            ]);
        }
    }

    /**
     * Deletes an existing Hall model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id, Yii::$app->user->id)->delete();
        return $this->goHome();
    }


    /**
     * @var Hall $model
     * @inheritdoc
     */
    protected function getParamsArray($model)
    {
        $category=Category::find()->all();

        if ($model->isNewRecord) {
            $list=json_decode($category[0]->options,true);
        } else {
            $list=json_decode($model->category->options,true);
        }

        return [
            'floor' => Floor::find()->all(),
            'town' => Town::find()->all(),
            'options' => Options::find()->where('id IN ('.implode(',',$list).')')->all(),
            'category' => $category,
            'district' => District::findAllDistrict(),
            'metro' => Metro::find()->all(),
        ];

    }

    /**
     * Finds the Hall model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Hall the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id, $user_id = null)
    {
        $model = Hall::findRow($id, $user_id);

        if (is_null($model)) {
            throw new NotFoundHttpException('The requested page does not exist.');
        } else {
            return $model;

        }
    }

    /**
     * Finds the Hall model based on its alias value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $category
     * @param string $hall
     * @return Hall the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModelByAlias($category,$hall, $user_id = null)
    {
        $model = HallSearch::findRowByAlias($category,$hall, $user_id);

        if (is_null($model)) {
            throw new NotFoundHttpException('The requested page does not exist.');
        } else {
            return $model;

        }
    }
}
