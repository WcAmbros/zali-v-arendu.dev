<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "address".
 *
 * @property integer $id
 * @property string $town
 * @property string $district
 * @property string $street
 * @property string $house
 * @property string $block
 * @property string $comment
 * @property string $metro
 *
 * @property Hall[] $halls
 */
class Address extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'address';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['comment'], 'string'],
            [['town', 'district', 'street', 'metro'], 'string', 'max' => 255],
            [['house', 'block'], 'string', 'max' => 45],
            [['town', 'street', 'house'], 'required'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'town' => 'Город',
            'district' => 'Район',
            'street' => 'Улица',
            'house' => 'Дом',
            'block' => 'Корпус',
            'comment' => 'Комментарий',
            'metro' => 'Метро',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHalls()
    {
        return $this->hasMany(Hall::className(), ['address_id' => 'id']);
    }
}
