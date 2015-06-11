<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "profile".
 *
 * @property integer $id
 * @property string $name
 * @property string $email
 * @property string $phone
 * @property string $image
 * @property integer $user_id
 *
 * @property User $user
 * @property Hall[] $halls
 */
class Profile extends \yii\db\ActiveRecord
{

    public $image = null;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'profile';
    }


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['images', 'attribs'], 'string'],
            [['user_id', 'phone'], 'required'],
            [['user_id'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['email', 'phone'], 'string', 'max' => 45]
        ];
    }

    public function behaviors()
    {
        return [
            'ProfileUploadImageBehavior' => [
                'class' => 'common\behaviors\ProfileUploadImageBehavior',
            ]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'name' => 'Имя',
            'email' => 'Email',
            'phone' => 'Телефон',
            'image' => 'Иконка',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
