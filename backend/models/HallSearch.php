<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * HallSearch represents the model behind the search form about `backend\models\Hall`.
 */
class HallSearch extends Hall
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'square', 'favourite', 'created_at', 'updated_at', 'public', 'deleted', 'floor_id', 'price_id', 'address_id', 'category_id', 'contacts_id'], 'integer'],
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
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Hall::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'square' => $this->square,
            'favourite' => $this->favourite,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'public' => $this->public,
            'deleted' => $this->deleted,
            'floor_id' => $this->floor_id,
            'price_id' => $this->price_id,
            'address_id' => $this->address_id,
            'category_id' => $this->category_id,
            'contacts_id' => $this->contacts_id,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'attribs', $this->attribs])
            ->andFilterWhere(['like', 'comments', $this->comments]);

        return $dataProvider;
    }
}
