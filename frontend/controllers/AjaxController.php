<?php
namespace frontend\controllers;


use Yii;
use yii\db\ActiveRecord;
use yii\web\Controller;
use frontend\models\District;
use frontend\models\Metro;


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
