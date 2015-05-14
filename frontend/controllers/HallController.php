<?php
namespace frontend\controllers;


use Yii;
use yii\web\Controller;
use frontend\models\Hall;
use frontend\models\HallHasEquipment;
use yii\web\NotFoundHttpException;

/**
 * Hall controller
 */
class HallController extends Controller
{
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
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionSearch(){
        $post=Yii::$app->request->post();
        return $this->render('search', [
            'model' => $this->findModels(),
            'purpose'=>$post['Search']['purpose'],
        ]);
    }

    public function actionCreate()
    {
        $post=Yii::$app->request->post();
        $model = new Hall();
        if($model->load($post)&& $model->save()){
            if(isset($post['Equipment']))
                foreach($post['Equipment'] as $item){
                    $equipment_has_hall=new HallHasEquipment();
                    $equipment_has_hall->hall_id=$model->id;
                    $equipment_has_hall->equipment_id=$item;
                    $equipment_has_hall->save();
                }
        }
        return $this->goBack();
    }
    public function actionRead($slug)
    {
    }

    public function actionUpdate($slug)
    {
    }

    public function actionDelete($slug)
    {
    }

    /**
     * Finds the Hall model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Hall the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Hall::findOne(['id' => $id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /**
     * Finds the Hall models
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @return Hall the loaded models
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModels()
    {
        $options=$this->getOptions();
        $model = Hall::find()->innerJoin('address')->innerJoin('purpose')->where($options)->all();
        if (!empty($model)) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /**
     * @return array
    */
    protected function getOptions(){
        $post=Yii::$app->request->post();
        $fields=[
            'purpose'=>'purpose.name',
            'district'=>'address.district',
            'metro'=>'address.metro',
        ];
        $options=array();
        foreach($post['Search'] as $key=>$item)
            $options[$fields[$key]]=$item;


        return  $options;
    }
}
