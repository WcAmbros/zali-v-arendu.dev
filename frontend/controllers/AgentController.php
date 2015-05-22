<?php
namespace frontend\controllers;


use frontend\models\Agent;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;


class AgentController extends Controller
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
                        'actions' => ['create','update'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ]
        ];
    }

    /**
     * Creates a new Agent model.
     * If creation is successful, the browser will be redirected to back page.
     * @return mixed
     */
    public function actionCreate()
    {
        $post=Yii::$app->request->post();
        $model = new Agent();

        if(($model->findOne(['user_id'=>Yii::$app->user->id]))!==null)
            throw new NotFoundHttpException('Страница недоступна.');


        $model->load($post);
        $model->user_id=Yii::$app->user->id;

        if (!empty($post)&&$model->save()) {
            return $this->goHome();
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Agent model.
     * If update is successful, the browser will be redirected to back page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $post=Yii::$app->request->post();
        $model->load($post);
        $model->user_id=Yii::$app->user->id;

        if (!empty($post)&&$model->save()) {
            return $this->goBack();
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }


    /**
     * Finds the Agent model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @param integer $user_id
     * @return Agent the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Agent::findOne(['id' => $id,'user_id'=>Yii::$app->user->id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('Страница недоступна.');
        }
    }
}
