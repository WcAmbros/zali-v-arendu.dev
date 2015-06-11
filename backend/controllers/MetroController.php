<?php

namespace backend\controllers;

use backend\models\MetroSearch;
use common\models\Metro;
use Yii;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * MetroController implements the CRUD actions for Metro model.
 */
class MetroController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Metro models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MetroSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Metro model.
     * @param integer $id
     * @param integer $district_id
     * @param integer $district_town_id
     * @return mixed
     */
    public function actionView($id, $district_id, $district_town_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id, $district_id, $district_town_id),
        ]);
    }

    /**
     * Creates a new Metro model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Metro();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id, 'district_id' => $model->district_id, 'district_town_id' => $model->district_town_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Metro model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @param integer $district_id
     * @param integer $district_town_id
     * @return mixed
     */
    public function actionUpdate($id, $district_id, $district_town_id)
    {
        $model = $this->findModel($id, $district_id, $district_town_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id, 'district_id' => $model->district_id, 'district_town_id' => $model->district_town_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Metro model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @param integer $district_id
     * @param integer $district_town_id
     * @return mixed
     */
    public function actionDelete($id, $district_id, $district_town_id)
    {
        $this->findModel($id, $district_id, $district_town_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Metro model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @param integer $district_id
     * @param integer $district_town_id
     * @return Metro the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id, $district_id, $district_town_id)
    {
        if (($model = Metro::findOne(['id' => $id, 'district_id' => $district_id, 'district_town_id' => $district_town_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
