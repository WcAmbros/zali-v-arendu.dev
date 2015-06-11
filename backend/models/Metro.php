<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "metro".
 *
 * @property integer $id
 * @property string $name
 * @property string $attribs
 * @property integer $district_id
 * @property integer $district_town_id
 *
 * @property District $district
 */
class Metro extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'metro';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['attribs'], 'string'],
            [['district_id', 'district_town_id'], 'required'],
            [['district_id', 'district_town_id'], 'integer'],
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
            'district_id' => 'District ID',
            'district_town_id' => 'District Town ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDistrict()
    {
        return $this->hasOne(District::className(), ['id' => 'district_id', 'town_id' => 'district_town_id']);
    }
}
