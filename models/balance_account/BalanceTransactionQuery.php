<?php

namespace app\models\balance_account;
use Yii;
use app\models\member\Member;

class BalanceTransactionQuery extends \yii\db\ActiveQuery
{
    public function prepare($builder)
    {
        $this->innerJoinWith('member');

        if (! Yii::$app->user->can('Application Admin')) {  
            $this->andWhere(['member.company_id' => Yii::$app->user->identity->profile->company_id]);
        }

        if (isset($this->where['id'])) {
            $this->where['balance_transaction.id'] = $this->where['id'];
            unset($this->where['id']);
        }

        if (isset($this->where['account_id'])) {
            $this->where['balance_transaction.account_id'] = $this->where['account_id'];
            unset($this->where['account_id']);
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
