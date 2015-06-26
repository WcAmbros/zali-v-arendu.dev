<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "category".
 *
 * @property integer $id
 * @property string $name
 * @property string $alias
 * @property string $options
 *
 * @property Hall[] $halls
 */
class Category extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'string', 'max' => 255],
            [['alias'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Наименование',
            'alias' => 'Алиас',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHalls()
    {
        return $this->hasMany(Hall::className(), ['category_id' => 'id']);
    }

    public function beforeSave($insert){
        if(isset(Yii::$app->request->post()['Options']))
            $this->options=json_encode(Yii::$app->request->post()['Options']);
        return parent::beforeSave($insert);
    }

    public function behaviors()
    {
        return [
            'SlugBehavior' => [
                'class' => 'common\behaviors\SlugBehavior',
                'translit' => true
            ]
        ];
    }
}
