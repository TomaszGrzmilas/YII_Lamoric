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
            [['title', 'text', 'sort_filter', 'text_all', 'date_filter', 'short_text', 'tag', 'file', 'category_id'], 'safe'],
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
    public function search($params, $catId = null)
    {
        if ($catId != null)
        {
            $search = array();
            $category = new \app\models\category\Category();
            $category = $category->findOne($catId);
            $subcat = $category->getSubCategories();

            foreach ($subcat as $key => $cat) {
                array_push($search,$cat->id);
            }
            if ($this->category_id == null)
            {
                array_push($search,$category->id);
            }
            $query = Document::find()->where(['in','category_id' , $search]);
        }
        else
        {
            $query = Document::find();
        }

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
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'text', $this->text])
            ->andFilterWhere(['like', 'short_text', $this->short_text])
            ->andFilterWhere(['like', 'tag', $this->tag])
         //   ->andFilterWhere(['like', 'file', $this->file])
            //->andFilterWhere(['like', 'category.name', $this->category_id]);
            ->andFilterWhere(['like', 'category_id', $this->category_id]);

        if($this->text_all != null)
        {
            $query->andFilterWhere (
                [
                    'OR' ,
                    [ 'like' , 'upper(title)' , strtoupper($this->text_all)],
                    [ 'like' , 'upper(text)' , strtoupper($this->text_all)],
                    [ 'like' , 'upper(short_text)' , strtoupper($this->text_all)],
                    [ 'like' , 'upper(tag)' , strtoupper($this->text_all)],
                ]
            );
        }

        if($this->date_filter != null)
        {
            $date = new \DateTime('NOW');
            switch ($this->date_filter) {
                case '1':
                    $query->andFilterWhere(
                        [
                            'WEEK(FROM_UNIXTIME(document.created_at))' => $date->format("W")
                        ]
                    );
                    break;
                case '2':
                    $query->andFilterWhere(
                        [
                            'MONTH(FROM_UNIXTIME(document.created_at))' => $date->format("m")
                        ]
                    );
                    break;
                case '3':
                    $query->andFilterWhere(
                        [
                            'YEAR(FROM_UNIXTIME(document.created_at))' => $date->format("Y")
                        ]
                    );
                    break;
            }
        }

        if($this->sort_filter != null)
        {
            switch ($this->sort_filter) {
                case '1':
                    $query->orderBy = [
                        'created_at' => SORT_DESC,
                    ];
                    break;
                case '2':
                    $query->orderBy = [
                        'created_at' => SORT_ASC,
                    ];
                    break;
                case '3':
                    $query->orderBy = [
                        'upper(title)' => SORT_ASC,
                    ];
                    break;
                case '4':
                    $query->orderBy = [
                        'upper(title)' => SORT_DESC,
                    ];
                    break;
            }
        }
        return $dataProvider;
    }
}
