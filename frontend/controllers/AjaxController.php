<?php
namespace frontend\controllers;


use common\models\District;
use common\models\Hall;
use common\models\Metro;
use Yii;
use yii\db\ActiveRecord;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class AjaxController extends Controller
{
    /**
     * @inheritdoc
     */
    public function actionIndex()
    {
        return $this->goHome();
    }

    /**
     * @inheritdoc
     */
    public function actionDistrict($name)
    {
        $model = new District();
        return $this->renderAjax('index', [
            'list' => $this->findAll($model, $name)
        ]);
    }

    /**
     * @inheritdoc
     */
    public function actionMetro($name)
    {
        $model = new Metro();
        return $this->renderAjax('index', [
            'list' => $this->findAll($model, $name)
        ]);
    }

    /**
     * @inheritdoc
     */
    public function actionPhone($id)
    {
        $model = Hall::findOne($id);
        echo json_encode(['response' => [
            'phone' => $model->contacts->phone
        ]]);
    }

    /**
     * @inheritdoc
     */
    public function actionRemoveimage($id)
    {

        /**
         * @var Hall $model
         */
        $get = Yii::$app->request->get();
        if (!Yii::$app->user->isGuest &&
            isset($get['hall'])
        ) {
            $model = Hall::findRow((int)$get['hall'], Yii::$app->user->id);
            $model->removeImage($id);
            if (!$model->save()) {
                throw new NotFoundHttpException('Не удалось сохранить изменения');
            }
        } else {
            throw new NotFoundHttpException('hall id is not exist.');

        };
    }


    /**
     * @param ActiveRecord $model
     * @param string $name
     *
     * @return array|ActiveRecord
     */
    private function findAll($model, $name)
    {
        return $model->find()->where("name like '%$name%'")->limit(7)->all();
    }
}
