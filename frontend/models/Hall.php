<?php

namespace frontend\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\data\Pagination;
use yii\db\Query;

/**
 * This is the model class for table "hall".
 *
 * @property integer $id
 * @property string $name
 * @property string $attribs
 * @property integer $square
 * @property string $images
 * @property string $optional_equipment
 * @property string $created
 * @property integer $public
 * @property integer $deleted
 * @property integer $floor_id
 * @property integer $category_id
 * @property integer $contacts_id
 * @property integer $price_id
 * @property integer $address_id
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
	public $images=null;
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
            [['square', 'public', 'created_at', 'updated_at','deleted', 'floor_id', 'category_id', 'contacts_id', 'price_id', 'address_id'], 'integer'],
            [['optional_equipment','attribs'], 'string'],
            [['floor_id', 'category_id', 'contacts_id', 'price_id', 'address_id'], 'required'],
            [['name'], 'string', 'max' => 255]
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
            'attribs' => 'Attribs',
            'square' => 'Square',
            'images' => 'Images',
            'optional_equipment' => 'Optional equipment',
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
        return $this->hasOne(Address::className(), ['id' => 'address_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getContacts()
    {
        return $this->hasOne(Contacts::className(), ['id' => 'contacts_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFloor()
    {
        return $this->hasOne(Floor::className(), ['id' => 'floor_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPrice()
    {
        return $this->hasOne(Price::className(), ['id' => 'price_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
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
     * @param array $post
     * @return Query
     */
    public  function search($post){

        return $this->find()->innerJoin('address','address.id=hall.address_id')
            ->innerJoin('category','category.id=hall.category_id')
            ->where($this->searchCondition($post));
    }

    /**
     * @param Query $query
     * @return Pagination
     */
    public  function searchPagination($query){
        $countQuery = clone $query;
        $pages = new Pagination([
            'totalCount' => $countQuery->count(),
            'pageSize'=>12
        ]);

        return $pages;
    }

    /**
     * @param array $post
     * @return string
     */
    private  function searchCondition($post){
        $fields=[
            'category'=>'category.name',
            'district'=>'address.district',
            'metro'=>'address.metro',
        ];
        $options=array();
        foreach($post['Search'] as $key=>$item)
            if(trim($item)!='')
                $options[]= $fields[$key].' LIKE ("%'.$item.'%")';

        return  implode(' AND ', $options);
    }

    public function removeImage($id){
        $attribs=json_decode($this->attribs);
        $images=$attribs->images;
        foreach($images as $key=>$image){
            if($key==$id){
                foreach($image as $path){
                    unlink($path);
                }
                unset($images[$id]);
            }
        }
        $attribs->images=$images;
        $this->attribs=json_encode($attribs);
    }

    /**
     * @var int $id
     * @var int $user_id
     *
     * @return null|Hall
    */
    public static function findRow($id,$user_id=null){
        if(is_null($user_id)){
            $model = static::findOne(['id' => $id]);
        }else{
            $hall = new Hall();
            $model=$hall->find()
                ->innerJoin('contacts','hall.contacts_id=contacts.id')
                ->where([
                    'contacts.user_id'=>$user_id,
                    'hall.id'=>$id
                ])
                ->one();
            if($model==false){
                $model=null;
            }
        }
        return $model;
    }
}
