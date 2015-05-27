<?php
namespace frontend\controllers;


use frontend\models\District;
use frontend\models\Hall;
use frontend\models\Metro;
use Yii;
use yii\db\ActiveRecord;
use yii\web\Controller;

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
        $model=new District();
        return $this->renderAjax('index',[
            'list'=>$this->findAll($model,$name)
        ]);
    }

    /**
     * @inheritdoc
     */
    public function actionMetro($name)
    {
        $model=new Metro();
        return $this->renderAjax('index',[
            'list'=>$this->findAll($model,$name)
        ]);
    }

    /**
     * @inheritdoc
     */
    public function actionPhone($id)
    {
        $model=Hall::findOne($id);
        echo json_encode(['response'=>[
            'phone'=>$model->contacts->phone
        ]]);
    }

    /**
     * @param ActiveRecord $model
     * @param string $name
     *
     * @return array|ActiveRecord
     */
    private function findAll($model,$name){
        return $model->find()->where("name like '%$name%'")->limit(7)->all();
    }
}
