<?php

namespace frontend\models;

use Yii;


/**
 * This is the model class for table "hall".
 *
 * @property integer $id
 * @property string $name
 * @property string $alias
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
            [['square', 'public', 'deleted', 'floor_id', 'purpose_id', 'agent_id', 'price_id', 'address_id'], 'integer'],
            [['images', 'optional_equipment'], 'string'],
            [['created'], 'safe'],
            [['floor_id', 'purpose_id', 'agent_id', 'price_id', 'address_id'], 'required'],
            [['name', 'alias'], 'string', 'max' => 255]
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
            'alias' => 'Alias',
            'square' => 'Square',
            'images' => 'Images',
            'optional_equipment' => 'Optional Equipment',
            'created' => 'Created',
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
//            'SlugBehavior' => [
//                'class' => 'common\behaviors\SlugBehavior',
//                'in_attribute' => 'name',
//                'out_attribute' => 'slug',
//                'translit' => true
//            ]
        ];
    }
}
