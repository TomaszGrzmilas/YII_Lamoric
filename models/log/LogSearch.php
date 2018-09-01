<?php

namespace app\models\log;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\log\Log;
use DateTime;


class LogSearch extends Log
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['user', 'prefix', 'message','log_time'], 'safe'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = Log::find();

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

        $query->andFilterWhere(['like', 'prefix', $this->prefix])
            ->andFilterWhere(['like', 'message', $this->message])
            ->andFilterWhere(['like', 'log_time', $this->log_time]);

        $sort = $dataProvider->getSort();

        $sort->defaultOrder = ['log_time' => SORT_DESC];
        
        $dataProvider->setSort($sort);

        return $dataProvider;
    }
}
