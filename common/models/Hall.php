<?php

namespace common\models;


use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "hall".
 *
 * @property integer $id
 * @property string $name
 * @property string $attribs
 * @property integer $square
 * @property string $images
 * @property string $favourite
 * @property string $created
 * @property integer $public
 * @property integer $deleted
 * @property integer $floor_id
 * @property integer $category_id
 * @property integer $contacts_id
 * @property integer $price_id
 * @property integer $address_id
 * @property integer $status
 *
 * @property Address $address
 * @property Contacts $contacts
 * @property Floor $floor
 * @property Price $price
 * @property Category $category
 * @property HallHasOptions[] $hallHasOptions
 * @property Options[] $options
 */
class Hall extends \yii\db\ActiveRecord
{
    const STATUS_UNPUBPLIC = 0;
    const STATUS_PUBPLIC = 1;
    const STATUS_WAIT = 2;
    const STATUS_DELETED = 3;


    public $images;
    public $verifyCode;

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
            [['favourite', 'square', 'public', 'created_at', 'updated_at', 'deleted', 'floor_id', 'category_id', 'contacts_id', 'price_id', 'address_id'], 'integer'],
            [['attribs'], 'string'],
            [['floor_id', 'category_id', 'contacts_id', 'price_id', 'address_id'], 'required'],
            [['name'], 'string', 'max' => 255],
            ['status', 'integer'],
            ['status', 'default', 'value' => self::STATUS_PUBPLIC],
            ['status', 'in', 'range' => array_keys(self::getStatusesArray())],
            ['verifyCode',
                'captcha',
                'captchaAction' => 'hall/captcha'
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public static function getStatusesArray()
    {
        return [
            self::STATUS_WAIT => 'Ожидает подтверждения',
            self::STATUS_DELETED => 'Удален',
            self::STATUS_PUBPLIC => 'Опубликован',
            self::STATUS_UNPUBPLIC => 'Не опубликован',
        ];
    }

    /**
     * @inheritdoc
     */
    public function getStatusName()
    {
        $statuses = self::getStatusesArray();
        return isset($statuses[$this->status]) ? $statuses[$this->status] : '';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Наименование',
            'attribs' => 'Attribs',
            'square' => 'Площадь',
            'favourite' => 'Популярные',
            'public' => 'Public',
            'deleted' => 'Deleted',
            'floor_id' => 'Floor ID',
            'category_id' => 'Category ID',
            'contacts_id' => 'contacts ID',
            'price_id' => 'Price ID',
            'address_id' => 'Address ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAddress()
    {
        if($this->isNewRecord){
                return new Address();
        }else{
            return $this->hasOne(Address::className(), ['id' => 'address_id']);
        }

    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getContacts()
    {
        if($this->isNewRecord){
            return new Contacts();
        }else{
            return $this->hasOne(Contacts::className(), ['id' => 'contacts_id']);
        }

    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFloor()
    {
        if($this->isNewRecord){
            return new Floor();
        }else{
            return $this->hasOne(Floor::className(), ['id' => 'floor_id']);
        }
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPrice()
    {

        if($this->isNewRecord){
            return new Price();
        }else {
            return $this->hasOne(Price::className(), ['id' => 'price_id']);
        }
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {

        if($this->isNewRecord){
            return new Category();
        }else{
            return $this->hasOne(Category::className(), ['id' => 'category_id']);
        }
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHallHasOptions()
    {
        return $this->hasMany(HallHasOptions::className(), ['hall_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOptions()
    {
        return $this->hasMany(Options::className(), ['id' => 'options_id'])->viaTable('hall_has_options', ['hall_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        if($this->isNewRecord){
            if(Yii::$app->user->isGuest){
                $user=User::findOne(['username'=>'guest']);
            }else{
                $user=User::findOne(['id'=>Yii::$app->user->id]);
            }

        }else{
            $user= $this->hasOne(User::className(), ['id' => 'user_id'])->viaTable('contacts', ['id' => 'contacts_id']);
        }

        return $user;
    }

    public function behaviors()
    {
        return [
            'UploadImageBehavior' => [
                'class' => 'common\behaviors\UploadImageBehavior',
            ],
            'HallBehavior' => [
                'class' => 'common\behaviors\HallBehavior',
            ],

            TimestampBehavior::className(),
//            'SlugBehavior' => [
//                'class' => 'common\behaviors\SlugBehavior',
//                'in_attribute' => 'name',
//                'out_attribute' => 'slug',
//                'translit' => true
//            ]
        ];
    }


    /**
     * @param int $id
     * @return void
     */
    public function removeImage($id)
    {
        $attribs = json_decode($this->attribs, true);
        $images = $attribs['images'];
        foreach ($images as $key => $image) {
            if ($key == $id) {
                if (!$this->isDefaultImages($image)) {
                    foreach ($image as $path) {
                        unlink($path);
                    }
                }
                unset($images[$id]);
            }
        }
        $images=array_values($images);
        $attribs['images'] = $images;
        $this->attribs = json_encode($attribs);
    }

    /**
     * @var array $image
     *
     * @return bool
     */
    public function isDefaultImages($image)
    {
        $list = [
            [
                'original' => "uploads/noimage.jpg",
                'thumbnail' => "uploads/th_noimage.jpg",
                'slide' => "uploads/slide_noimage.jpg",
            ]
        ];

        return in_array($image, $list);

    }

    /**
     * если требуется найти зал пользователя, то регион не учитываем
     *
     * @var int $id
     * @var int $user_id
     *
     * @return null|Hall
     */
    public static function findRow($id, $user_id = null)
    {

        if (is_null($user_id)) {
            $model = static::_findRowWithOutUser($id);
        } else {
            $model = static::_findRowWithUser($id, $user_id);
        }
        if ($model == false) {
            $model = null;
        }
        return $model;
    }

    /**
     * @var int $id
     *
     * @return bool|Hall
     */
    private static function _findRowWithOutUser($id)
    {
        $town = static::getRegion();
        return static::find()
            ->innerJoin('address', 'hall.address_id=address.id')
            ->where([
                'hall.id' => $id,
                'address.town' => $town->name
            ])
            ->one();
    }

    /**
     *
     * @var int $id
     * @var int $user_id
     *
     * @return bool|Hall
     */
    private static function _findRowWithUser($id, $user_id)
    {
        return static::find()
            ->innerJoin('contacts', 'hall.contacts_id=contacts.id')
            ->where([
                'contacts.user_id' => $user_id,
                'hall.id' => $id
            ])
            ->one();
    }

    /**
     * @var int $limit
     *
     * @return array
     */
    public function favourites($limit = null)
    {
        $town = $this->getRegion();
        return $this->find()->innerJoin('address', 'hall.address_id=address.id')
            ->where([
                    'favourite' => 1,
                    'address.town' => $town->name
                ]
            )->limit($limit)->all();
    }

    /**
     * @var int $limit
     *
     * @return array
     */
    public function similar($limit = null)
    {

    }

    /**
     * @return \frontend\models\Region
     */
    public static function getRegion()
    {
        $town = Yii::$app->region->currentRegion();
        if (is_null($town)) {
            $town = Yii::$app->region->defaultRegion();
        }
        return $town;
    }


    public function afterSave($insert, $changedAttributes){
        HallHasOptions::deleteAll(['hall_id'=>$this->id]);
        $post=Yii::$app->request->post('Hall');
        foreach($post['options'] as $item){
            $_options=new HallHasOptions();
            $_options->hall_id=$this->id;
            $_options->options_id=$item;
            $_options->save();
        }
        $this->options=json_encode(Yii::$app->request->post()['Options']);
        parent::afterSave($insert, $changedAttributes);
    }
}
