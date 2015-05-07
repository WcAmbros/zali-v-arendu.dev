<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "hall".
 *
 * @property integer $id
 * @property string $town
 * @property string $district
 * @property string $street
 * @property string $house
 * @property string $block
 * @property string $comment
 * @property string $metro
 * @property string $attribs
 * @property integer $square
 * @property string $images
 * @property string $optional_equipment
 * @property string $created
 * @property integer $public
 * @property integer $deleted
 * @property string $alias
 * @property integer $user_id
 *
 * @property Agent $agent
 * @property HallHasType[] $hallHasTypes
 * @property Type[] $types
 * @property Price[] $prices
 */
class Hall extends \yii\db\ActiveRecord
{

    public $image=null;
    /**
     * @inheritdoc
     */

    public static function tableName()
    {
        return 'hall';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id'], 'required'],
            [['id', 'square', 'public', 'deleted', 'user_id'], 'integer'],
            [['comment', 'attribs', 'images', 'optional_equipment'], 'string'],
            [['created'], 'safe'],
            [['town', 'district', 'street', 'metro', 'alias'], 'string', 'max' => 255],
            [['house', 'block'], 'string', 'max' => 45],
            [['image'],'image','mimeTypes'=>'image/png,image/jpeg','message'=>'Разрешены изображения формата png, jpg ']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'town' => 'Town',
            'district' => 'District',
            'street' => 'Street',
            'house' => 'House',
            'block' => 'Block',
            'comment' => 'Comment',
            'metro' => 'Metro',
            'attribs' => 'Attribs',
            'square' => 'Square',
            'images' => 'Images',
            'optional_equipment' => 'Optional Equipment',
            'created' => 'Created',
            'public' => 'Public',
            'deleted' => 'Deleted',
            'alias' => 'Alias',
            'user_id' => 'User ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAgent()
    {
        return $this->hasOne(Agent::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHallHasTypes()
    {
        return $this->hasMany(HallHasType::className(), ['hall_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTypes()
    {
        return $this->hasMany(Type::className(), ['id' => 'type_id'])->viaTable('hall_has_type', ['hall_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPrices()
    {
        return $this->hasMany(Price::className(), ['hall_id' => 'id']);
    }


    public function behaviors()
    {
        return [
            'UploadImageBehavior' => [
                'class' => 'app\common\behaviors\UploadImageBehavior',
            ]
        ];
    }
}
