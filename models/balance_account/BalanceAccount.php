<?php

namespace app\models\balance_account;

use Yii;

/**
 * This is the model class for table "{{%balance_account}}".
 *
 * @property int $id
 * @property double $balance
 *
 * @property BalanceTransaction[] $balanceTransactions
 * @property BalanceTransaction[] $balanceTransactions0
 * @property Member[] $members
 */
class BalanceAccount extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%balance_account}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['balance'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('db/balanceaccount', 'ID'),
            'balance' => Yii::t('db/balanceaccount', 'Balance'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBalanceTransactions()
    {
        return $this->hasMany(BalanceTransaction::className(), ['account_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBalanceTransactions0()
    {
        return $this->hasMany(BalanceTransaction::className(), ['extra_account_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMembers()
    {
        return $this->hasMany(Member::className(), ['account_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return BalanceAccountQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new BalanceAccountQuery(get_called_class());
    }
}