<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "district".
 *
 * @property integer $id
 * @property string $name
 * @property integer $town_id
 * @property integer $category_id
 *
 * @property DistrictCategory $category
 * @property Town $town
 * @property Metro[] $metros
 */
class District extends \yii\db\ActiveRecord
{
    public $f_category=null;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'district';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['town_id', 'category_id'], 'required'],
            [['town_id', 'category_id'], 'integer'],
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
            'town_id' => 'Town ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(DistrictCategory::className(), ['id' => 'category_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTown()
    {
        return $this->hasOne(Town::className(), ['id' => 'town_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMetros()
    {
        return $this->hasMany(Metro::className(), ['district_id' => 'id', 'district_town_id' => 'town_id']);
    }

    /**
     * @return array
     */
    public function findAllDistrict(){
        return $this->find()->select('district.*, dc.name f_category')
            ->innerJoin('district_category dc', 'district.category_id=dc.id')->all();
    }
}
