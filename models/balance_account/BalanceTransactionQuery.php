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

    /**
     * {@inheritdoc}
     * @return BalanceTransaction[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return BalanceTransaction|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
