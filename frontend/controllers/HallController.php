<?php
namespace frontend\controllers;


use common\models\Category;
use common\models\District;
use common\models\Floor;
use common\models\Hall;
use common\models\HallHasOptions;
use common\models\Metro;
use common\models\Options;
use Yii;
use yii\filters\AccessControl;
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
                        'actions' => ['update', 'delete', 'create'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['form', 'search', 'view', 'all'],
                        'allow' => true
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
    public function actionView($id)
    {
        $metro = new Metro();

        return $this->render('view', [
            'model' => $this->findModel($id),
            'metro' => $metro->find()->all(),
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
            return $this->redirect(['search']);
        } else {
            $post = Yii::$app->session->get('search');
        }
        $category = new Category();
        $district = new District();
        $metro = new Metro();
        $hall = new Hall();

        $query = $hall->search($post);
        $pages = $hall->searchPagination($query);

        $models = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->all();

        return $this->render('search', [
            'models' => $models,
            'pages' => $pages,
            'post' => $post,
            'category' => $category->find()->all(),
            'district' => $district->findAllDistrict(),
            'metro' => $metro->findAllMetro(),
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
            $this->_saveOptions($model->id);
        }
        return $this->goBack();
    }

    /**
     * @inheritdoc
     */
    public function actionForm()
    {
        $params = $this->getParams();
        return $this->renderAjax('create', $params);
    }

    /**
     * @inheritdoc
     */
    public function actionUpdate($id)
    {
        /**
         * @var  Hall $model
         */

        $params = $this->getParams($id);
        $model = $params['model'];
        $post = Yii::$app->request->post();

        if ($model->load($post) && $model->save()) {
            $this->_saveOptions($model->id);
            return $this->redirect([
                'view',
                'id' => $model->id,
            ]);
        } else {
            return $this->renderAjax('update', $params);
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
     * @inheritdoc
     */
    protected function getParams($id = null)
    {
        $floor = Floor::find()->all();
        $category = Category::find()->all();
        $district = new District();
        $metro = new Metro();

        if (is_null($id)) {
            $model = new Hall();
            $list=json_decode($category[0]->options,true);

        } else {
            $model = $this->findModel($id, Yii::$app->user->id);
            $list=json_decode($model->category->options,true);
        }

        return [
            'model' => $model,
            'floor' => $floor,
            'options' => $options=Options::find()->where('id IN ('.implode(',',$list).')')->all(),
            'category' => $category,
            'district' => $district->findAllDistrict(),
            'metro' => $metro->findAllMetro(),
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
     * @inheritdoc
     */
    private function _saveOptions($hall_id)
    {
        $post = Yii::$app->request->post();
        if (isset($post['Options'])) {
            $option_has_hall = new HallHasOptions();
            $option_has_hall->deleteAll(['hall_id' => $hall_id]);

            foreach ($post['Options'] as $item) {
                $option_has_hall = new HallHasOptions();
                $option_has_hall->hall_id = $hall_id;
                $option_has_hall->options_id = $item;
                $option_has_hall->save();
            }
        }
    }


    public function ajaxSearch($id){

        $post = Yii::$app->session->get('search');
        $hall = new Hall();
        $hall->find()->innerJoin("price",'hall.price_id=price.id');

        /*
         * Модель запроса при поиске через ajax
            SELECT distinct hall.* FROM `hall`
            inner join address on hall.address_id=address.id
            inner join floor on hall.floor_id=floor.id
            inner join price on hall.price_id=price.id
            left join hall_has_options hho on hall.id=hho.hall_id
            left join options on hho.options_id=options.id

            order by hall.id asc
        */

    }

    public function _builderQuery(){
        $get=Yii::$app->request->get();
        $default=[
            'order'=>[
                'price'
            ]
        ];

    }

}
