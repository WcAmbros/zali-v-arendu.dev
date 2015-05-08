<?php
namespace common\behaviors;

use yii;
use yii\base\Behavior;
use yii\db\ActiveRecord;
use frontend\models\Price;
use frontend\models\Address;
use frontend\models\Purpose;
use frontend\models\Floor;
use frontend\models\Agent;

class HallImageBehavior extends Behavior{

    public function events()
    {
        return [
            ActiveRecord::EVENT_BEFORE_VALIDATE => 'beforeValidate',
        ];
    }

    /**
     * Loading post data
     * */
    public function beforeValidate($event)
    {
        $price=$this->savePrice();
        $address=$this->saveAddress();
        $agent=$this->saveAgent();
        $this->owner->price_id=$price->id;
        $this->owner->address_id=$address->id;
        $this->owner->agent_id=$agent->id;
    }

    /**
     * @return Price
     **/
    private function savePrice(){
        $post=Yii::$app->request->post();
        $model = new Price();
        $model->load($post);
        $model->save();
        return $model;
    }

    /**
     * @return Address
     **/
    private function saveAddress(){
        $post=Yii::$app->request->post();
        $model = new Address();
        $model->load($post);
        $model->save();
        return $model;
    }

    /**
     * @return Agent
     **/
    private function saveAgent(){
        $post=Yii::$app->request->post();
        $model = new Agent();
        $model->load($post);

        if(Yii::$app->user->isGuest){
            $user=new User();
            $user=$user->findOne(['name'=>'guest']);
            $model->user_id=$user->id;
        }else{
            $model->user_id=Yii::$app->session->get('__id');
        }
        $model->save();

        return $model;
    }
}