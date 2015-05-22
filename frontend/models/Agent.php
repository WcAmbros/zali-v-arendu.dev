<?php

namespace frontend\models;

use common\models\User;
use Yii;

/**
 * This is the model class for table "agent".
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
class Agent extends \yii\db\ActiveRecord
{

    public $image=null;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'agent';
    }


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['images'], 'string'],
            [['user_id','name','email','phone'], 'required'],
            [['user_id'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['email', 'phone'], 'string', 'max' => 45]
        ];
    }

    public function behaviors()
    {
        return [
            'AgentUploadImageBehavior' => [
                'class' => 'common\behaviors\AgentUploadImageBehavior',
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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHalls()
    {
        return $this->hasMany(Hall::className(), ['agent_id' => 'id']);
    }
}
