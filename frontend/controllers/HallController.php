<?php
namespace frontend\controllers;


use Yii;
use yii\web\Controller;
use frontend\models\Hall;
use frontend\models\HallHasEquipment;

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

    public function actionRead($slug)
    {
    }

    public function actionUpdate($slug)
    {
    }

    public function actionDelete($slug)
    {
    }
}
