<?php
namespace frontend\controllers;


use frontend\models\Category;
use frontend\models\District;
use frontend\models\Floor;
use frontend\models\Hall;
use frontend\models\HallHasOptions;
use frontend\models\Metro;
use frontend\models\Options;
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
                        'actions' => ['update','delete'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['form'],
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

    public  function actionIndex(){
        return $this->goBack();
    }

    public function actionView($id){
        $metro=new Metro();

        return $this->render('view', [
            'model' => $this->findModel($id),
            'metro'=>$metro->find()->all(),
        ]);
    }

    public function actionSearch(){
        $post=Yii::$app->request->post();
        if(!empty($post)){
            Yii::$app->session->set('search',$post);
        }else{
            $post=Yii::$app->session->get('search');
        }
        $category=new Category();
        $district=new District();
        $metro=new Metro();
        $hall=new  Hall();

        $query = $hall->search($post);
        $pages = $hall->searchPagination($query);

        $models = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->all();

        return $this->render('search', [
            'models' => $models,
            'pages' => $pages,
            'search'=>$post['Search'],
            'category'=>$category->find()->all(),
            'district'=>$district->find()->all(),
            'metro'=>$metro->find()->all(),
        ]);
    }

    public function actionCreate()
    {
        $post=Yii::$app->request->post();
        $model = new Hall();
        if($model->load($post)&& $model->save()){
            if(isset($post['Options']))
                foreach($post['Options'] as $item){
                    $option_has_hall=new HallHasOptions();
                    $option_has_hall->hall_id=$model->id;
                    $option_has_hall->options_id=$item;
                    $option_has_hall->save();
                }
        }
        return $this->goBack();
    }

    public function actionForm(){
        $floor=new Floor();
        $options=new Options();
        $category=new Category();
        $district=new District();
        $metro=new Metro();
        $model=new Hall();
        return $this->render('form',[
            'floor'=>$floor->find()->all(),
            'options'=>$options->find()->all(),
            'category'=>$category->find()->all(),
            'district'=>$district->find()->all(),
            'metro'=>$metro->find()->all(),
            'model'=>$model,
        ]);
    }
    public function actionUpdate($id)
    {
        $floor=new Floor();
        $options=new Options();
        $category=new Category();
        $district=new District();
        $metro=new Metro();
        $model=$this->findModel($id,Yii::$app->user->id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect([
                'view',
                'id'=>$model->id,
            ]);
        }else {
            return $this->render('update', [
                'model' => $model,
                'floor'=>$floor->find()->all(),
                'options'=>$options->find()->all(),
                'category'=>$category->find()->all(),
                'district'=>$district->find()->all(),
                'metro'=>$metro->find()->all(),
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
        $this->findModel($id,Yii::$app->user->id)->delete();
        return $this->goHome();
    }

    /**
     * Finds the Hall model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Hall the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id,$user_id=null)
    {
        if(is_null($user_id)){
            $model = Hall::findOne(['id' => $id]);
        }else{
            $hall = new Hall();
            $model=$hall->find()
                ->innerJoin('contacts',['hall.contacts_id'=>'contacts.id'])
                ->innerJoin('user',['contacts.user_id'=>'user.id'])
                ->where([
                    'user.id'=>$user_id,
                    'hall.id'=>$id
                ])
                ->one();
        }

        if (($model) === null||$model===false) {
            throw new NotFoundHttpException('The requested page does not exist.');
        } else {
            return $model;

        }
    }

}
