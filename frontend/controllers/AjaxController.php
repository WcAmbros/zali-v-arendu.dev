<?php
namespace frontend\controllers;



use Yii;
use yii\db\ActiveRecord;
use yii\web\Controller;
use frontend\models\District;
use frontend\models\Metro;
use frontend\models\Hall;


class AjaxController extends Controller
{
    public function actionIndex()
    {
        return $this->goHome();
    }

    public function actionDistrict($name)
    {
        $model=new District();
        return $this->renderAjax('index',[
            'list'=>$this->findAll($model,$name)
        ]);
    }

    public function actionMetro($name)
    {
        $model=new Metro();
        return $this->renderAjax('index',[
            'list'=>$this->findAll($model,$name)
        ]);
    }

    public function actionPhone($id)
    {
        $model=Hall::findOne($id);
        echo json_encode(['response'=>[
            'phone'=>$model->agent->phone
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
