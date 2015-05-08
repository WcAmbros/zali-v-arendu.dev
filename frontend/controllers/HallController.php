<?php
namespace frontend\controllers;


use common\models\User;
use frontend\models\Agent;
use Yii;
use yii\captcha\CaptchaAction;
use yii\web\Controller;
use frontend\models\Hall;

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

        $post=Yii::$app->request->post()
        $model = new Hall();
        if($model->load($post)&& $model->save()){}

        //return $this->goBack();
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
