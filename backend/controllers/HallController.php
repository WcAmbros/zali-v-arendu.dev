<?php

namespace backend\controllers;

use backend\models\HallSearch;
use common\models\Category;
use common\models\District;
use common\models\Floor;
use common\models\Hall;
use common\models\Metro;
use common\models\Options;
use common\models\Town;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * HallController implements the CRUD actions for Hall model.
 */
class HallController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Hall models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new HallSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Hall model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Hall model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Hall();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        } else {
            return $this->render('create', [
                'model' => $model,
                'params'=>$this->getParamsArray($model),
            ]);
        }
    }

    /**
     * Updates an existing Hall model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        } else {
            return $this->render('update', [
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
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
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
     * @var Hall $model
     *
     * @return array
     */
    public function getParamsArray($model){

        $category=Category::find()->all();

        if ($model->isNewRecord) {
            $list=json_decode($category[0]->options,true);
        } else {
            $list=json_decode($model->category->options,true);
        }

        return [
            'options'=>Options::find()->where('id IN ('.implode(',',$list).')')->all(),
            'floor' => Floor::find()->all(),
            'town' => Town::find()->all(),
            'category' => $category,
            'district' => District::find()->all(),
            'metro' => Metro::find()->all(),
        ];
    }
}
