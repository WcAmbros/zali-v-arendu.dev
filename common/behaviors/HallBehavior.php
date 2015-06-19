<?php
/**
 * @author Zakharov Stanislav <zahs88@gmail.com>
 */

namespace common\behaviors;

use common\models\Address;
use common\models\Contacts;
use common\models\Price;
use common\models\User;
use yii;
use yii\base\Behavior;
use yii\db\ActiveRecord;

/**
 * Class HallBehavior
 * @package common\behaviors
 * @property \common\models\Hall $owner
 */

class HallBehavior extends Behavior
{

    /**
     * @return array
     */
    public function events()
    {
        return [
            ActiveRecord::EVENT_BEFORE_VALIDATE => 'beforeValidate',
        ];
    }

    /**
     * Loading post data
     *
     * ['address_id', 'price_id', 'floor_id', 'contacts_id', 'category_id',  ], 'required'
     * */
    public function beforeValidate($event)
    {

        $post = Yii::$app->request->post();

        $address=new Address();
        $price=new Price();

        $contacts=new Contacts();
        $contacts->user_id=(Yii::$app->user->isGuest)?User::findOne(['username' => 'guest'])->id:Yii::$app->user->id;

        $transaction=Yii::$app->db->beginTransaction();
        if(
            $address->load($post)&&
            $price->load($post)&&
            $contacts->load($post)&&

            $address->save()&&
            $price->save()&&
            $contacts->save()
        ){
            $this->owner->address_id = $address->id;
            $this->owner->price_id = $price->id;
            $this->owner->contacts_id = $contacts->id;

            $this->owner->name = $this->setName();

            $this->owner->attribs = json_encode(
                [
                    'images' => $this->images(),
                    'geocode' => $post['Hall']['geocode']
                ]
            );
            $transaction->commit();
        }else{
            $transaction->rollBack();
        }
    }


    /**
     * @return array
     **/
    private function images()
    {
        if ($this->owner->isNewRecord) {
            $images = $this->owner->images;
        } else {
            $attribs = json_decode($this->owner->attribs, true);
            $images = array_merge($attribs['images'], $this->owner->images);
        }
        return $images;
    }

    /**
     * @return string
     **/
    private function setName()
    {
        $post = Yii::$app->request->post();
        $name = '';
        foreach ($post['Address'] as $key => $value) {
            if (in_array($key, ['street', 'house', 'block']) && trim($value) != '') {
                if ($key == 'street')
                    $name .= $value;
                if ($key == 'house')
                    $name .= ', д.' . $value;
                if ($key == 'block')
                    $name .= ', к.' . $value;
            }
        }
        return $name;
    }
}