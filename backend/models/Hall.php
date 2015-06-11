<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "hall".
 *
 * @property integer $id
 * @property string $name
 * @property string $attribs
 * @property integer $square
 * @property integer $favourite
 * @property string $comments
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $public
 * @property integer $deleted
 * @property integer $floor_id
 * @property integer $price_id
 * @property integer $address_id
 * @property integer $category_id
 * @property integer $contacts_id
 *
 * @property Address $address
 * @property Category $category
 * @property Contacts $contacts
 * @property Floor $floor
 * @property Price $price
 * @property HallHasOptions[] $hallHasOptions
 * @property Options[] $options
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
            [['attribs', 'comments'], 'string'],
            [['square', 'favourite', 'created_at', 'updated_at', 'public', 'deleted', 'floor_id', 'price_id', 'address_id', 'category_id', 'contacts_id'], 'integer'],
            [['created_at', 'updated_at', 'floor_id', 'price_id', 'address_id', 'category_id', 'contacts_id'], 'required'],
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
            'favourite' => 'Favourite',
            'comments' => 'Comments',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'public' => 'Public',
            'deleted' => 'Deleted',
            'floor_id' => 'Floor ID',
            'price_id' => 'Price ID',
            'address_id' => 'Address ID',
            'category_id' => 'Category ID',
            'contacts_id' => 'Contacts ID',
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
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getContacts()
    {
        return $this->hasOne(Contacts::className(), ['id' => 'contacts_id']);
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
    public function getHallHasOptions()
    {
        return $this->hasMany(HallHasOptions::className(), ['hall_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOptions()
    {
        return $this->hasMany(Options::className(), ['id' => 'options_id'])->viaTable('hall_has_options', ['hall_id' => 'id']);
    }
}
