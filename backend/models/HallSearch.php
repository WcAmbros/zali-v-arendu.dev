<?php

namespace backend\models;



use common\models\Hall;
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
            [['id', 'square', 'status','favourite', 'created_at', 'updated_at', 'public', 'deleted', 'floor_id', 'price_id', 'address_id', 'category_id', 'contacts_id'], 'integer'],

            [['name','attribs', 'comments'], 'safe'],
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
     * @return \yii\db\ActiveQuery
     */
    public function getAddress()
    {
        if($this->isNewRecord){
            return new AddressSearch();
        }else{
            return $this->hasOne(AddressSearch::className(), ['id' => 'address_id']);
        }

    }



    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {

        if($this->isNewRecord){
            return new CategorySearch();
        }else{
            return $this->hasOne(CategorySearch::className(), ['id' => 'category_id']);
        }
    }

    /**
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        if($this->isNewRecord){
            return new UserSearch();
        }else{
            return $user= $this->hasOne(UserSearch::className(), ['id' => 'user_id'])->viaTable('contacts', ['id' => 'contacts_id']);
        }
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
            return $dataProvider;
        }

        $query->andFilterWhere(['hall.id' => $this->id,])->
            andFilterWhere(['hall.status' => $this->status])->
            andFilterWhere(['like', 'hall.name', $this->name])->
            orFilterWhere(['like', 'category.name', $this->name])->
            orFilterWhere(['like', 'address.town', $this->name])->
            orFilterWhere(['like', 'user.username', $this->name])->
                leftJoin('address','hall.address_id=address.id')->
                leftJoin('category','hall.category_id=category.id')->
                leftJoin('contacts','hall.contacts_id=contacts.id')->
                leftJoin('user','contacts.user_id=user.id');

        return $dataProvider;
    }
}
