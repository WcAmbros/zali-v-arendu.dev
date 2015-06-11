<?php

namespace backend\controllers;

use backend\models\District;
use backend\models\DistrictSearch;
use Yii;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * DistrictController implements the CRUD actions for District model.
 */
class DistrictController extends Controller
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
     * Lists all District models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new DistrictSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single District model.
     * @param integer $id
     * @param integer $town_id
     * @param integer $category_id
     * @return mixed
     */
    public function actionView($id, $town_id, $category_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id, $town_id, $category_id),
        ]);
    }

    /**
     * Creates a new District model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new District();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id, 'town_id' => $model->town_id, 'category_id' => $model->category_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing District model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @param integer $town_id
     * @param integer $category_id
     * @return mixed
     */
    public function actionUpdate($id, $town_id, $category_id)
    {
        $model = $this->findModel($id, $town_id, $category_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id, 'town_id' => $model->town_id, 'category_id' => $model->category_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing District model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @param integer $town_id
     * @param integer $category_id
     * @return mixed
     */
    public function actionDelete($id, $town_id, $category_id)
    {
        $this->findModel($id, $town_id, $category_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the District model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @param integer $town_id
     * @param integer $category_id
     * @return District the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id, $town_id, $category_id)
    {
        if (($model = District::findOne(['id' => $id, 'town_id' => $town_id, 'category_id' => $category_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
