<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "town".
 *
 * @property integer $id
 * @property string $name
 * @property string $subdomain
 *
 * @property District[] $districts
 */
class Town extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'town';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'subdomain'], 'string', 'max' => 255]
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
            'subdomain' => 'Subdomain',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDistricts()
    {
        return $this->hasMany(District::className(), ['town_id' => 'id']);
    }

}
