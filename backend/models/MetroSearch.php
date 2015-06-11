<?php

namespace backend\models;

use common\models\Metro;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * MetroSearch represents the model behind the search form about `backend\models\Metro`.
 */
class MetroSearch extends Metro
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'district_id', 'district_town_id'], 'integer'],
            [['name', 'attribs'], 'safe'],
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
        $query = Metro::find();

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
            'district_id' => $this->district_id,
            'district_town_id' => $this->district_town_id,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'attribs', $this->attribs]);

        return $dataProvider;
    }
}
