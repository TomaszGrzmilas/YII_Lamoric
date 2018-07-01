<?php

namespace app\models\company;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * CompanySearch represents the model behind the search form of `app\models\Company`.
 */
class CompanySearch extends Company
{
    
    public function rules()
    {
        return [
            [['name'], 'safe'],
            [['zip_code'], 'string', 'max' => 6], 
            [['city', 'street'], 'string', 'max' => 100], 
            [['building', 'local'], 'string', 'max' => 5], 
            [['notes'], 'string', 'max' => 2000], 
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = Company::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'company_id' => $this->company_id,

        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
              ->andFilterWhere(['like', 'zip_code', $this->zip_code])
              ->andFilterWhere(['like', 'city', $this->city])
              ->andFilterWhere(['like', 'street', $this->street])
              ->andFilterWhere(['like', 'building', $this->building])
              ->andFilterWhere(['like', 'local', $this->local])
              ->andFilterWhere(['like', 'notes', $this->notes]);
        return $dataProvider;
    }
}
