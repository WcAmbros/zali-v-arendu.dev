<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "options".
 *
 * @property integer $id
 * @property string $name
 *
 * @property HallHasOptions[] $hallHasOptions
 * @property Hall[] $halls
 */
class Options extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'options';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'string', 'max' => 255],
            ['name', 'unique'],
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
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHallHasOptions()
    {
        return $this->hasMany(HallHasOptions::className(), ['options_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHalls()
    {
        return $this->hasMany(Hall::className(), ['id' => 'hall_id'])->viaTable('hall_has_options', ['options_id' => 'id']);
    }
}
