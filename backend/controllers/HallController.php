<?php

namespace backend\controllers;

use backend\models\Hall;
use backend\models\HallSearch;
use Yii;
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
     * @param integer $floor_id
     * @param integer $price_id
     * @param integer $address_id
     * @param integer $category_id
     * @param integer $contacts_id
     * @return mixed
     */
    public function actionView($id, $floor_id, $price_id, $address_id, $category_id, $contacts_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id, $floor_id, $price_id, $address_id, $category_id, $contacts_id),
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
            return $this->redirect(['view', 'id' => $model->id, 'floor_id' => $model->floor_id, 'price_id' => $model->price_id, 'address_id' => $model->address_id, 'category_id' => $model->category_id, 'contacts_id' => $model->contacts_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Hall model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @param integer $floor_id
     * @param integer $price_id
     * @param integer $address_id
     * @param integer $category_id
     * @param integer $contacts_id
     * @return mixed
     */
    public function actionUpdate($id, $floor_id, $price_id, $address_id, $category_id, $contacts_id)
    {
        $model = $this->findModel($id, $floor_id, $price_id, $address_id, $category_id, $contacts_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id, 'floor_id' => $model->floor_id, 'price_id' => $model->price_id, 'address_id' => $model->address_id, 'category_id' => $model->category_id, 'contacts_id' => $model->contacts_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Hall model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @param integer $floor_id
     * @param integer $price_id
     * @param integer $address_id
     * @param integer $category_id
     * @param integer $contacts_id
     * @return mixed
     */
    public function actionDelete($id, $floor_id, $price_id, $address_id, $category_id, $contacts_id)
    {
        $this->findModel($id, $floor_id, $price_id, $address_id, $category_id, $contacts_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Hall model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @param integer $floor_id
     * @param integer $price_id
     * @param integer $address_id
     * @param integer $category_id
     * @param integer $contacts_id
     * @return Hall the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id, $floor_id, $price_id, $address_id, $category_id, $contacts_id)
    {
        if (($model = Hall::findOne(['id' => $id, 'floor_id' => $floor_id, 'price_id' => $price_id, 'address_id' => $address_id, 'category_id' => $category_id, 'contacts_id' => $contacts_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
