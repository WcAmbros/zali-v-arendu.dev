<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;

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

    public function actionCreate()
    {
        $model = new Hall();
        $post=Yii::$app->request->post();
        $post['Hall']['user_id']=Yii::$app->session->get('__id');


        if($model->load($post)&& $model->save())
            return $this->goBack();

    }

    public function actionRead()
    {
    }

    public function actionDelete()
    {
    }
}
