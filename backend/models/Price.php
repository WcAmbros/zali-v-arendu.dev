<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "price".
 *
 * @property integer $id
 * @property integer $min
 * @property integer $max
 *
 * @property Hall[] $halls
 */
class Price extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'price';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['min', 'max'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'min' => 'Min',
            'max' => 'Max',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHalls()
    {
        return $this->hasMany(Hall::className(), ['price_id' => 'id']);
    }
}
