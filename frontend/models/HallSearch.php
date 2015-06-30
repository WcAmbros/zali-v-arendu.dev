<?php

namespace frontend\models;

use common\models\Hall;
use common\models\Price;
use Yii;
use yii\base\Model;
use yii\data\Pagination;
use yii\db\Query;

/**
 * HallSearch represents the model behind the search form about `frontend\models\Hall`.
 */
class HallSearch extends Hall
{
    public $min=null;
    public $max=null;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'square','status','favourite', 'created_at', 'updated_at', 'public', 'deleted', 'floor_id', 'price_id', 'address_id', 'category_id', 'contacts_id'], 'integer'],
            [['name', 'attribs', 'comments'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
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
            ->innerJoin('floor', 'hall.floor_id=floor.id')
            ->innerJoin('hall_has_options', 'hall_has_options.hall_id=hall.id')
            ->distinct()
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
            'pageSize' => 11
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
        $town = $this::getRegion();

        $fields = $this->fieldsArray() ;
        $options = array();
        if(isset($post['Search'])){
            foreach ($post['Search'] as $key => $item){
                if (trim($item) != '')
                    $options[] = $fields[$key] . ' LIKE ("%' . $item . '%")';
            }
        }
        $options[] = $fields['town'] . ' LIKE ("%' . $town->name . '%")';
        $options[] = "hall.status=".$this::STATUS_PUBPLIC;

        return implode(' AND ', $options);
    }

    private function fieldsArray(){
        return [
            'category' => 'category.name',
            'district' => 'address.district',
            'metro' => 'address.metro',
            'town' => 'address.town',
            'square' => 'hall.square',
            'floor' => 'floor.name',
            'options'=>'hall_has_options.options_id',
        ];
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

    public static function findRowByAlias($category,$hall,$user_id=null){
        if(is_null($user_id)){
            return static::find()
                ->innerJoin('category', 'hall.category_id=category.id')
                ->andFilterWhere(['hall.alias'=>$hall])
                ->andFilterWhere(['category.alias'=>$category])
                ->one();
        }else{
            return static::find()
                ->innerJoin('contacts', 'hall.contacts_id=contacts.id')
                ->innerJoin('category', 'hall.category_id=category.id')
                ->andFilterWhere(['hall.alias'=>$hall])
                ->andFilterWhere(['category.alias'=>$category])
                ->andFilterWhere(['contacts.user_id' => $user_id])
                ->one();
        }
    }


    public  function getParamsPrice($post=array()){
        return Price::find()->select('min(price.min) min ,max(price.max) max')
            ->innerJoin('hall','price.id=hall.price_id')
            ->innerJoin('category','category.id=hall.category_id')
            ->innerJoin('address','address.id=hall.address_id')
            ->andFilterWhere(['hall.status'=>$this::STATUS_PUBPLIC])
            ->andFilterWhere(['like','address.town',$this::getRegion()->name])
            ->andFilterWhere(['like','category.name',$post['Search']['category']])
            ->one();
    }

    public  function getParamsSquare($post=array()){
        return static::find()->select('min(hall.square) min ,max(hall.square) max')
            ->innerJoin('category','category.id=hall.category_id')
            ->innerJoin('address','address.id=hall.address_id')
            ->andFilterWhere(['hall.status'=>$this::STATUS_PUBPLIC])
            ->andFilterWhere(['like','address.town',$this::getRegion()->name])
            ->andFilterWhere(['like','category.name',$post['Search']['category']])
            ->distinct()
            ->one();
    }
}
