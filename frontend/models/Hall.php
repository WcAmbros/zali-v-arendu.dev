<?php

namespace frontend\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\data\Pagination;
use yii\db\Query;

/**
 * This is the model class for table "hall".
 *
 * @property integer $id
 * @property string $name
 * @property string $attribs
 * @property integer $square
 * @property string $images
 * @property string $optional_equipment
 * @property string $created
 * @property integer $public
 * @property integer $deleted
 * @property integer $floor_id
 * @property integer $purpose_id
 * @property integer $agent_id
 * @property integer $price_id
 * @property integer $address_id
 *
 * @property Address $address
 * @property Agent $agent
 * @property Floor $floor
 * @property Price $price
 * @property Purpose $purpose
 * @property HallHasEquipment[] $hallHasEquipments
 * @property Equipment[] $equipment
 */
class Hall extends \yii\db\ActiveRecord
{
	public $images=null;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'hall';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['square', 'public', 'created_at', 'updated_at','deleted', 'floor_id', 'purpose_id', 'agent_id', 'price_id', 'address_id'], 'integer'],
            [['optional_equipment','attribs'], 'string'],
            [['floor_id', 'purpose_id', 'agent_id', 'price_id', 'address_id'], 'required'],
            [['name'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'attribs' => 'Attribs',
            'square' => 'Square',
            'images' => 'Images',
            'optional_equipment' => 'Optional Equipment',
            'public' => 'Public',
            'deleted' => 'Deleted',
            'floor_id' => 'Floor ID',
            'purpose_id' => 'Purpose ID',
            'agent_id' => 'Agent ID',
            'price_id' => 'Price ID',
            'address_id' => 'Address ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAddress()
    {
        return $this->hasOne(Address::className(), ['id' => 'address_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAgent()
    {
        return $this->hasOne(Agent::className(), ['id' => 'agent_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFloor()
    {
        return $this->hasOne(Floor::className(), ['id' => 'floor_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPrice()
    {
        return $this->hasOne(Price::className(), ['id' => 'price_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPurpose()
    {
        return $this->hasOne(Purpose::className(), ['id' => 'purpose_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHallHasEquipments()
    {
        return $this->hasMany(HallHasEquipment::className(), ['hall_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEquipment()
    {
        return $this->hasMany(Equipment::className(), ['id' => 'equipment_id'])->viaTable('hall_has_equipment', ['hall_id' => 'id']);
    }

    public function behaviors()
    {
        return [
            'UploadImageBehavior' => [
                'class' => 'common\behaviors\UploadImageBehavior',
            ],
            'HallBehavior' => [
                'class' => 'common\behaviors\HallBehavior',
            ],
	        TimestampBehavior::className(),
//            'SlugBehavior' => [
//                'class' => 'common\behaviors\SlugBehavior',
//                'in_attribute' => 'name',
//                'out_attribute' => 'slug',
//                'translit' => true
//            ]
        ];
    }



    /**
     * @param array $post
     * @return Query
     */
    public  function search($post){

        return $this->find()->innerJoin('address','address.id=hall.address_id')
            ->innerJoin('purpose','purpose.id=hall.purpose_id')
            ->where($this->searchOptions($post));
    }

    /**
     * @param Query $query
     * @return Pagination
     */
    public  function searchPagination($query){
        $countQuery = clone $query;
        $pages = new Pagination([
            'totalCount' => $countQuery->count(),
            'pageSize'=>12
        ]);

        return $pages;
    }

    /**
     * @param array $post
     * @return array
     */
    private  function searchOptions($post){
        $fields=[
            'purpose'=>'purpose.name',
            'district'=>'address.district',
            'metro'=>'address.metro',
        ];
        $options=array();

        foreach($post['Search'] as $key=>$item)
            $options[$fields[$key]]=$item;


        return  $options;
    }
}
