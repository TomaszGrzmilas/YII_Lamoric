<?php

namespace app\models\balance_account;
use Yii;

class BalanceAccountQuery extends \yii\db\ActiveQuery
{
    public function prepare($builder)
    {
        $this->innerJoinWith('member');

        if (! Yii::$app->user->can('Application Admin')) {  
            $this->andWhere(['member.company_id' => Yii::$app->user->identity->profile->company_id]);
        }

        if (isset($this->where['id'])) {
            $this->where['balance_account.id'] = $this->where['id'];
            unset($this->where['id']);
        }
        return parent::prepare($builder);
    }

    public function all($db = null)
    {
        return parent::all($db);
    }

    public function one($db = null)
    {
        return parent::one($db);
    }
}
