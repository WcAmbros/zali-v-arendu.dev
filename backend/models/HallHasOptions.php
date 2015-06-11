<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "hall_has_options".
 *
 * @property integer $hall_id
 * @property integer $options_id
 *
 * @property Hall $hall
 * @property Options $options
 */
class HallHasOptions extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'hall_has_options';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['hall_id', 'options_id'], 'required'],
            [['hall_id', 'options_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'hall_id' => 'Hall ID',
            'options_id' => 'Options ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHall()
    {
        return $this->hasOne(Hall::className(), ['id' => 'hall_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOptions()
    {
        return $this->hasOne(Options::className(), ['id' => 'options_id']);
    }
}
