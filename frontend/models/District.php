<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "district".
 *
 * @property integer $id
 * @property string $name
 * @property integer $town_id
 *
 * @property Town $town
 * @property Metro[] $metros
 */
class District extends \yii\db\ActiveRecord
{
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
            [['town_id'], 'required'],
            [['town_id'], 'integer'],
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
}
