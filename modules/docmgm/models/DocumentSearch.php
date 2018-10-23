<?php

namespace app\modules\docmgm\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\docmgm\models\Document;

/**
 * DocumentSearch represents the model behind the search form of `app\modules\docmgm\models\Document`.
 */
class DocumentSearch extends Document
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['doc_id'], 'integer'],
            [['title', 'text', 'short_text', 'tag', 'file', 'category_id'], 'safe'],
        ];
    }

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
        $query = Document::find();

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

        $query->joinWith('category');

        // grid filtering conditions
        $query->andFilterWhere([
            'doc_id' => $this->doc_id,
            //'category_id' => $this->category_id,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'text', $this->text])
            ->andFilterWhere(['like', 'short_text', $this->short_text])
            ->andFilterWhere(['like', 'tag', $this->tag])
            ->andFilterWhere(['like', 'file', $this->file])
            ->andFilterWhere(['like', 'category.name', $this->category_id]);

        return $dataProvider;
    }
}
