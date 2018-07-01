<?php

namespace app\models\category;

use creocoder\nestedsets\NestedSetsQueryBehavior;


class CategoryQuery extends \yii\db\ActiveQuery
{
    public function behaviors() {
        return [
            NestedSetsQueryBehavior::className(),
        ];
    }

    /**
     * {@inheritdoc}
     * @return CategoryQuery[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return CategoryQuery|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}