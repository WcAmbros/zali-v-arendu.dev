<?php

namespace frontend\models;

use common\models\Hall;
use Yii;
use yii\base\Model;
use yii\data\Pagination;
use yii\db\Query;

/**
 * HallSearch represents the model behind the search form about `frontend\models\Hall`.
 */
class HallSearch extends Hall
{
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
        $options[] = "hall.status=".$this::STATUS_PUBPLIC;

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
}
