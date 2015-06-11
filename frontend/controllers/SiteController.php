<?php
namespace frontend\controllers;



use common\models\Category;
use common\models\District;
use common\models\Floor;
use common\models\Hall;
use common\models\Metro;
use common\models\Options;
use frontend\models\ContactForm;
use Yii;
use yii\web\Controller;

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
        $floor = new Floor();

        $options = new Options();
        $category = new Category();
        $district = new District();
        $metro = new Metro();
        $hall = new Hall();

        return $this->render('index', [
            'floor' => $floor->find()->all(),
            'options' => $options->find()->all(),
            'category' => $category->find()->all(),
            'district' => $district->findAllDistrict(),
            'metro' => $metro->findAllMetro(),
            'favourites' => $hall->favourites(8),
        ]);
    }

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
