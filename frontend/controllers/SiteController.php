<?php
namespace frontend\controllers;


use Yii;
use frontend\models\ContactForm;
use yii\web\Controller;
use frontend\models\Floor;
use frontend\models\Purpose;
use frontend\models\Equipment;
use frontend\models\District;
use frontend\models\Metro;

/**
 * Site controller
 */
class SiteController extends Controller
{
     /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex()
    {
	    $floor=new Floor();

	    $equipment=new Equipment();
        $purpose=new Purpose();
	    $district=new District();
	    $metro=new Metro();

        return $this->render('index',[
	        'floor'=>$floor->find()->all(),
	        'equipment'=>$equipment->find()->all(),
            'purpose'=>$purpose->find()->all(),
	        'district'=>$district->find()->all(),
	        'metro'=>$metro->find()->all(),
        ]);
    }

    /* обновление данных в метро
    public function metro(){

        $data ='[{"id":"1","name":"\u0410\u0432\u0442\u043e\u0432\u043e","line":"1"}, {"id":"2","name":"\u0410\u0434\u043c\u0438\u0440\u0430\u043b\u0442\u0435\u0439\u0441\u043a\u0430\u044f","line":"5"}, {"id":"3","name":"\u0410\u043a\u0430\u0434\u0435\u043c\u0438\u0447\u0435\u0441\u043a\u0430\u044f","line":"1"}, {"id":"4","name":"\u0411\u0430\u043b\u0442\u0438\u0439\u0441\u043a\u0430\u044f","line":"1"}, {"id":"5","name":"\u0411\u0443\u0445\u0430\u0440\u0435\u0441\u0442\u0441\u043a\u0430\u044f","line":"5"}, {"id":"6","name":"\u0412\u0430\u0441\u0438\u043b\u0435\u043e\u0441\u0442\u0440\u043e\u0432\u0441\u043a\u0430\u044f","line":"3"}, {"id":"7","name":"\u0412\u043b\u0430\u0434\u0438\u043c\u0438\u0440\u0441\u043a\u0430\u044f","line":"1"}, {"id":"8","name":"\u0412\u043e\u043b\u043a\u043e\u0432\u0441\u043a\u0430\u044f","line":"5"}, {"id":"9","name":"\u0412\u044b\u0431\u043e\u0440\u0433\u0441\u043a\u0430\u044f","line":"1"}, {"id":"10","name":"\u0413\u043e\u0440\u044c\u043a\u043e\u0432\u0441\u043a\u0430\u044f","line":"2"}, {"id":"11","name":"\u0413\u043e\u0441\u0442\u0438\u043d\u044b\u0439 \u0434\u0432\u043e\u0440","line":"3"}, {"id":"12","name":"\u0413\u0440\u0430\u0436\u0434\u0430\u043d\u0441\u043a\u0438\u0439 \u041f\u0440\u043e\u0441\u043f\u0435\u043a\u0442","line":"1"}, {"id":"13","name":"\u0414\u0435\u0432\u044f\u0442\u043a\u0438\u043d\u043e","line":"1"}, {"id":"14","name":"\u0414\u043e\u0441\u0442\u043e\u0435\u0432\u0441\u043a\u0430\u044f","line":"4"}, {"id":"15","name":"\u0415\u043b\u0438\u0437\u0430\u0440\u043e\u0432\u0441\u043a\u0430\u044f","line":"3"}, {"id":"16","name":"\u0417\u0432\u0451\u0437\u0434\u043d\u0430\u044f","line":"2"}, {"id":"17","name":"\u0417\u0432\u0435\u043d\u0438\u0433\u043e\u0440\u043e\u0434\u0441\u043a\u0430\u044f","line":"5"}, {"id":"18","name":"\u041a\u0438\u0440\u043e\u0432\u0441\u043a\u0438\u0439 \u0417\u0430\u0432\u043e\u0434","line":"1"}, {"id":"19","name":"\u041a\u043e\u043c\u0435\u043d\u0434\u0430\u043d\u0442\u0441\u043a\u0438\u0439 \u041f\u0440\u043e\u0441\u043f\u0435\u043a\u0442","line":"5"}, {"id":"20","name":"\u041a\u0440\u0435\u0441\u0442\u043e\u0432\u0441\u043a\u0438\u0439 \u041e\u0441\u0442\u0440\u043e\u0432","line":"5"}, {"id":"21","name":"\u041a\u0443\u043f\u0447\u0438\u043d\u043e","line":"2"}, {"id":"22","name":"\u041b\u0430\u0434\u043e\u0436\u0441\u043a\u0430\u044f","line":"4"}, {"id":"23","name":"\u041b\u0435\u043d\u0438\u043d\u0441\u043a\u0438\u0439 \u041f\u0440\u043e\u0441\u043f\u0435\u043a\u0442","line":"1"}, {"id":"24","name":"\u041b\u0435\u0441\u043d\u0430\u044f","line":"1"}, {"id":"25","name":"\u041b\u0438\u0433\u043e\u0432\u0441\u043a\u0438\u0439 \u041f\u0440\u043e\u0441\u043f\u0435\u043a\u0442","line":"4"}, {"id":"26","name":"\u041b\u043e\u043c\u043e\u043d\u043e\u0441\u043e\u0432\u0441\u043a\u0430\u044f","line":"3"}, {"id":"27","name":"\u041c\u0430\u044f\u043a\u043e\u0432\u0441\u043a\u0430\u044f","line":"3"}, {"id":"28","name":"\u041c\u0435\u0436\u0434\u0443\u043d\u0430\u0440\u043e\u0434\u043d\u0430\u044f","line":"5"}, {"id":"29","name":"\u041c\u043e\u0441\u043a\u043e\u0432\u0441\u043a\u0430\u044f","line":"2"}, {"id":"30","name":"\u041c\u043e\u0441\u043a\u043e\u0432\u0441\u043a\u0438\u0435 \u0412\u043e\u0440\u043e\u0442\u0430","line":"2"}, {"id":"31","name":"\u041d\u0430\u0440\u0432\u0441\u043a\u0430\u044f","line":"1"}, {"id":"32","name":"\u041d\u0435\u0432\u0441\u043a\u0438\u0439 \u041f\u0440\u043e\u0441\u043f\u0435\u043a\u0442","line":"2"}, {"id":"33","name":"\u041d\u043e\u0432\u043e\u0447\u0435\u0440\u043a\u0430\u0441\u0441\u043a\u0430\u044f","line":"4"}, {"id":"34","name":"\u041e\u0431\u0432\u043e\u0434\u043d\u044b\u0439 \u041a\u0430\u043d\u0430\u043b","line":"5"}, {"id":"35","name":"\u041e\u0431\u0443\u0445\u043e\u0432\u043e","line":"3"}, {"id":"36","name":"\u041e\u0437\u0435\u0440\u043a\u0438","line":"2"}, {"id":"37","name":"\u041f\u0430\u0440\u043a \u041f\u043e\u0431\u0435\u0434\u044b","line":"2"}, {"id":"38","name":"\u041f\u0430\u0440\u043d\u0430\u0441","line":"2"}, {"id":"39","name":"\u041f\u0435\u0442\u0440\u043e\u0433\u0440\u0430\u0434\u0441\u043a\u0430\u044f","line":"2"}, {"id":"40","name":"\u041f\u0438\u043e\u043d\u0435\u0440\u0441\u043a\u0430\u044f","line":"2"}, {"id":"41","name":"\u041f\u043b\u043e\u0449\u0430\u0434\u044c \u0410\u043b\u0435\u043a\u0441\u0430\u043d\u0434\u0440\u0430 \u041d\u0435\u0432\u0441\u043a\u043e\u0433\u043e 1","line":"3"}, {"id":"42","name":"\u041f\u043b\u043e\u0449\u0430\u0434\u044c \u0410\u043b\u0435\u043a\u0441\u0430\u043d\u0434\u0440\u0430 \u041d\u0435\u0432\u0441\u043a\u043e\u0433\u043e 2","line":"4"}, {"id":"43","name":"\u041f\u043b\u043e\u0449\u0430\u0434\u044c \u0412\u043e\u0441\u0441\u0442\u0430\u043d\u0438\u044f","line":"1"}, {"id":"44","name":"\u041f\u043b\u043e\u0449\u0430\u0434\u044c \u041b\u0435\u043d\u0438\u043d\u0430","line":"1"}, {"id":"45","name":"\u041f\u043b\u043e\u0449\u0430\u0434\u044c \u041c\u0443\u0436\u0435\u0441\u0442\u0432\u0430","line":"1"}, {"id":"46","name":"\u041f\u043e\u043b\u0438\u0442\u0435\u0445\u043d\u0438\u0447\u0435\u0441\u043a\u0430\u044f","line":"1"}, {"id":"47","name":"\u041f\u0440\u0438\u043c\u043e\u0440\u0441\u043a\u0430\u044f","line":"3"}, {"id":"48","name":"\u041f\u0440\u043e\u043b\u0435\u0442\u0430\u0440\u0441\u043a\u0430\u044f","line":"3"}, {"id":"49","name":"\u041f\u0440\u043e\u0441\u043f\u0435\u043a\u0442 \u0411\u043e\u043b\u044c\u0448\u0435\u0432\u0438\u043a\u043e\u0432","line":"4"}, {"id":"50","name":"\u041f\u0440\u043e\u0441\u043f\u0435\u043a\u0442 \u0412\u0435\u0442\u0435\u0440\u0430\u043d\u043e\u0432","line":"1"}, {"id":"51","name":"\u041f\u0440\u043e\u0441\u043f\u0435\u043a\u0442 \u041f\u0440\u043e\u0441\u0432\u0435\u0449\u0435\u043d\u0438\u044f","line":"2"}, {"id":"52","name":"\u041f\u0443\u0448\u043a\u0438\u043d\u0441\u043a\u0430\u044f","line":"1"}, {"id":"53","name":"\u0420\u044b\u0431\u0430\u0446\u043a\u043e\u0435","line":"3"}, {"id":"54","name":"\u0421\u0430\u0434\u043e\u0432\u0430\u044f","line":"5"}, {"id":"55","name":"\u0421\u0435\u043d\u043d\u0430\u044f \u041f\u043b\u043e\u0449\u0430\u0434\u044c","line":"2"}, {"id":"56","name":"\u0421\u043f\u0430\u0441\u0441\u043a\u0430\u044f","line":"4"}, {"id":"57","name":"\u0421\u043f\u043e\u0440\u0442\u0438\u0432\u043d\u0430\u044f","line":"5"}, {"id":"58","name":"\u0421\u0442\u0430\u0440\u0430\u044f \u0414\u0435\u0440\u0435\u0432\u043d\u044f","line":"5"}, {"id":"59","name":"\u0422\u0435\u0445\u043d\u043e\u043b\u043e\u0433\u0438\u0447\u0435\u0441\u043a\u0438\u0439 \u0418\u043d\u0441\u0442\u0438\u0442\u0443\u0442","line":"1"}, {"id":"60","name":"\u0423\u0434\u0435\u043b\u044c\u043d\u0430\u044f","line":"2"}, {"id":"61","name":"\u0423\u043b\u0438\u0446\u0430 \u0414\u044b\u0431\u0435\u043d\u043a\u043e","line":"4"}, {"id":"62","name":"\u0424\u0440\u0443\u043d\u0437\u0435\u043d\u0441\u043a\u0430\u044f","line":"2"}, {"id":"63","name":"\u0427\u0451\u0440\u043d\u0430\u044f \u0420\u0435\u0447\u043a\u0430","line":"2"}, {"id":"64","name":"\u0427\u0435\u0440\u043d\u044b\u0448\u0435\u0432\u0441\u043a\u0430\u044f","line":"1"}, {"id":"65","name":"\u0427\u043a\u0430\u043b\u043e\u0432\u0441\u043a\u0430\u044f","line":"5"}, {"id":"66","name":"\u042d\u043b\u0435\u043a\u0442\u0440\u043e\u0441\u0438\u043b\u0430","line":"2"}]';
        $data=json_decode($data);
        foreach($data as $obj){
            if(($model = Metro::findOne(['id'=>$obj->id]))!==null){
                $line='';
                switch($obj->line){
                    case 1: $line='i-metro_red';break;
                    case 2: $line='i-metro_blue';break;
                    case 3: $line='i-metro_green';break;
                    case 4: $line='i-metro_orange';break;
                    case 5: $line='i-metro_purple';break;
                }
                $attribs=[
                    'options'=>[
                        'class'=>$line
                    ]
                ];

                $model->attribs=json_encode($attribs);
                $model->save();
            }
        }
    }*/

    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending email.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    public function actionAbout()
    {
        return $this->render('about');
    }
}
