<?php

namespace app\modules\docmgm\models\member_doc;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\docmgm\models\member_doc\MemberDoc;

class MemberDocSearch extends MemberDoc
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['member_doc_id', 'created_by', 'created_at', 'updated_by', 'updated_at'], 'integer'],
            [['text','title'], 'safe'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = MemberDoc::find();

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
            'member_doc_id' => $this->member_doc_id,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title]);

        return $dataProvider;
    }
}
