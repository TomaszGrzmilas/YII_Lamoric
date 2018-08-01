<?php

namespace app\models\balance_account;

/**
 * This is the ActiveQuery class for [[BalanceTransaction]].
 *
 * @see BalanceTransaction
 */
class BalanceTransactionQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    public function all($db = null)
    {
        return parent::all($db);
    }

    public function one($db = null)
    {
        return parent::one($db);
    }
}
