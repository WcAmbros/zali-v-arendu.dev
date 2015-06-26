<?php

namespace backend\models;

use common\models\Address;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * AddressSearch represents the model behind the search form about `common\models\Address`.
 */
class AddressSearch extends Address
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['town', 'district', 'street', 'house', 'block', 'comment', 'metro'], 'safe'],
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
        $query = Address::find();

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
        ]);

        $query->andFilterWhere(['like', 'town', $this->town])
            ->andFilterWhere(['like', 'district', $this->district])
            ->andFilterWhere(['like', 'street', $this->street])
            ->andFilterWhere(['like', 'metro', $this->metro]);

        return $dataProvider;
    }
}