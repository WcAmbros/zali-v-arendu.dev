<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "metro".
 *
 * @property integer $id
 * @property string $name
 * @property string $attribs
 * @property integer $district_id
 *
 * @property Town $town
 * @property District $district
 */
class Metro extends \yii\db\ActiveRecord
{
    public $f_district=null;
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
        return $this->hasOne(District::className(), ['id' => 'district_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTown()
    {
        return $this->hasOne(Town::className(), ['id' => 'town_id'])->viaTable('district', ['id' => 'district_id']);
    }

    /**
     * @return array
     */
    public function findAllMetro(){
        return $this->find()->select("metro.*,district.name f_district")
            ->innerJoin("district","metro.district_id=district.id")->all();
    }
}
