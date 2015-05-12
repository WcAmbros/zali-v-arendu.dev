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
    public function actionView($id){
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionSearch(){
        return $this->render('search', [
            'model' => $this->findModels(),
        ]);
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

        $model = Hall::find()->all();
        if (!empty($model)) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
