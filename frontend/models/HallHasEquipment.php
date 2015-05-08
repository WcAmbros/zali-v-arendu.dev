<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "hall_has_equipment".
 *
 * @property integer $hall_id
 * @property integer $equipment_id
 *
 * @property Equipment $equipment
 * @property Hall $hall
 */
class HallHasEquipment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'hall_has_equipment';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['hall_id', 'equipment_id'], 'required'],
            [['hall_id', 'equipment_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'hall_id' => 'Hall ID',
            'equipment_id' => 'Equipment ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEquipment()
    {
        return $this->hasOne(Equipment::className(), ['id' => 'equipment_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHall()
    {
        return $this->hasOne(Hall::className(), ['id' => 'hall_id']);
    }
}
