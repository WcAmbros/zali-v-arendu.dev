<?php
namespace frontend\controllers;


use common\models\Category;
use common\models\District;
use common\models\Hall;
use common\models\Metro;
use common\models\Options;
use common\models\Town;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class AjaxController extends Controller
{
    /**
     * @inheritdoc
     */
    public function actionIndex()
    {
        throw new NotFoundHttpException('The requested page does not exist.');
    }

//    /**
//     * @inheritdoc
//     */
//    public function actionDistrict($name)
//    {
//        $model = new District();
//        return $this->renderAjax('index', [
//            'list' => $this->findAll($model, $name)
//        ]);
//    }
//
//    /**
//     * @inheritdoc
//     */
//    public function actionMetro($name)
//    {
//        $model = new Metro();
//        return $this->renderAjax('index', [
//            'list' => $this->findAll($model, $name)
//        ]);
//    }

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

    public function actionList(){
        $get=Yii::$app->request->get();
        $result=array();

        if(isset($get['type'])&&isset($get['name'])){

            /**@var $region Town*/
            if(is_null($region=Yii::$app->region->currentRegion())){
                $region=Yii::$app->region->defaultRegion();
            }
            if($get['type']==='metro'){

                $result= Metro::find()->leftJoin('district','district.id=metro.district_id')->where([
                        'district.name'=>$get['name'],
                        'district.town_id'=>$region->id
                    ]
                )->all();
            }
            if($get['type']==='district'){

                $result=District::find()->leftJoin('metro','metro.district_id=district.id')->where([
                    'metro.name'=>$get['name'],
                    'district.town_id'=>$region->id,
                ])->all();
            }
            if($get['type']==='options'){

                $category=Category::findOne(['id'=>(int)$get['name']]);
                if(!is_null($category)){
                    $list_options=json_decode($category->options,true);
                    if(!empty($list_options)){
                        $result=Options::find()->where('id IN ('.implode(',',$list_options).')')->all();
                    }
                }

            }
        }
        return $this->renderAjax('index',['list'=>$result]);
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

//
//
//    /**
//     * @param ActiveRecord $model
//     * @param string $name
//     *
//     * @return array|ActiveRecord
//     */
//    private function findAll($model, $name)
//    {
//        return $model->find()->where("name like '%$name%'")->limit(7)->all();
//    }
}
