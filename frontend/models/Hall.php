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
 * @property string $favourite
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
    public $images = null;

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
            'favourite' => 'Favourite',
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
     *
     * @return array
     */
    public function extendSearch($post){
//        $def_post=[
////            'category'=>$post['category']
//        ];
//        $result=[];
//        foreach($post as $key=>$value){
//            $result[$key]=$this->search(
//                array_merge($def_post,[$key=>$value])
//            )->all();
//        }
//        return $result;
    }

    /**
     * @param array $post
     *
     * @return Query
     */
    public function search($post)
    {

        return $this->find()
            ->innerJoin('address', 'hall.address_id=address.id')
            ->innerJoin('category', 'hall.category_id=category.id')
            ->innerJoin('price', 'hall.price_id=price.id')
            ->where($this->searchCondition($post))->orderBy($this->searchOrder($post));
    }

    /**
     * @param Query $query
     *
     * @return Pagination
     */
    public function searchPagination($query)
    {
        $countQuery = clone $query;
        $pages = new Pagination([
            'totalCount' => $countQuery->count(),
            'pageSize' => 12
        ]);

        return $pages;
    }

    /**
     * @param array $post
     *
     * @return string
     */
    private function searchCondition($post)
    {
        $town = $this->getRegion();

        $fields = [
            'category' => 'category.name',
            'district' => 'address.district',
            'metro' => 'address.metro',
            'town' => 'address.town'
        ];
        $options = array();
        if(isset($post['Search'])){
            foreach ($post['Search'] as $key => $item){
                if (trim($item) != '')
                    $options[] = $fields[$key] . ' LIKE ("%' . $item . '%")';
            }
        }


        $options[] = $fields['town'] . ' LIKE ("%' . $town->name . '%")';

        return implode(' AND ', $options);
    }

    private function searchOrder($post){
        $order=[
            'asc' => SORT_ASC,
            'desc' => SORT_DESC
        ];

        $fields=[
            'price'=>'price.min'
        ];

        $options = array();
        if(isset($post['Order'])){
            foreach ($post['Order'] as $key => $item){
                if(isset($order[$item])&&isset($fields[$key])){
                    $value=$order[$item];
                    $options[$fields[$key]] = $value;
                }
            }
        }

        return $options;
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
     * @return Region
     */
    private static function getRegion()
    {
        $town = Yii::$app->region->currentRegion();
        if (is_null($town)) {
            $town = Yii::$app->region->defaultRegion();
        }
        return $town;
    }
}
