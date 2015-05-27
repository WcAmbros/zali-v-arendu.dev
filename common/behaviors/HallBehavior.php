<?php
namespace common\behaviors;

use common\models\User;
use frontend\models\Address;
use frontend\models\Contacts;
use frontend\models\Price;
use yii;
use yii\base\Behavior;
use yii\db\ActiveRecord;

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
     * ['floor_id', 'purpose_id', 'contacts_id', 'price_id', 'address_id'], 'required'
     * */
    public function beforeValidate($event)
    {
	    $post=Yii::$app->request->post();
        $price=$this->savePrice();
        $address=$this->saveAddress();
        $contacts=$this->saveContacts();
        $this->owner->name=$this->setName();
        $this->owner->price_id=$price->id;
        $this->owner->address_id=$address->id;
        $this->owner->contacts_id=$contacts->id;
        $this->owner->floor_id=$post['Hall']['floor'];
        $this->owner->category_id=$post['Hall']['category'];
	    $this->owner->attribs=json_encode(
            [
                'images'=>$this->owner->images,
                'geocode'=>$post['Hall']['geocode']
            ]
        );
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
     * @return Contacts
     **/
    private function saveContacts(){

        if(Yii::$app->user->isGuest){
            $post=Yii::$app->request->post();
            $model = new Contacts();
            $model->load($post);
            $user=new User();
            $user=$user->findOne(['username'=>'guest']);
            $model->user_id=$user->id;
            $model->save();

        }else{

            $model = Contacts::findOne(['user_id'=>Yii::$app->user->id]);
        }

        return $model;
    }
}