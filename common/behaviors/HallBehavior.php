<?php
namespace common\behaviors;

use yii;
use yii\base\Behavior;
use yii\db\ActiveRecord;
use frontend\models\Price;
use frontend\models\Address;
use frontend\models\Agent;

class HallBehavior extends Behavior{

    public function events()
    {
        return [
            ActiveRecord::EVENT_BEFORE_VALIDATE => 'beforeValidate',
        ];
    }

    /**
     * Loading post data
     *
     * ['floor_id', 'purpose_id', 'agent_id', 'price_id', 'address_id'], 'required'
     * */
    public function beforeValidate($event)
    {
	    $post=Yii::$app->request->post();
        $price=$this->savePrice();
        $address=$this->saveAddress();
        $agent=$this->saveAgent();
        $this->owner->name=$this->setName();
        $this->owner->price_id=$price->id;
        $this->owner->address_id=$address->id;
        $this->owner->agent_id=$agent->id;
        $this->owner->floor_id=$post['Hall']['floor'];
        $this->owner->purpose_id=$post['Hall']['purpose'];
	    $this->owner->attribs=$post['Hall']['geocode'];
    }

    /**
     * @return string
     **/
    private function setName(){
        $post=Yii::$app->request->post();
		$name='';
	    foreach($post['Address'] as $key=>$value){
		    if(in_array($key,['street','house','block'])&&trim($value)!=''){
			    if($key=='street')
				    $name.=$value;
			    if($key=='house')
				    $name.=', д.'.$value;
			    if($key=='block')
				    $name.=', к.'.$value;
		    }
	    }
        return $name;
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