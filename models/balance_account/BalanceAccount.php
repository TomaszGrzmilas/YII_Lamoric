<?php

namespace app\models\balance_account;

use Yii;
use app\models\member\Member;

/**
 * This is the model class for table "{{%balance_account}}".
 *
 * @property int $id
 * @property double $balance
 *
 * @property BalanceTransaction[] $balanceTransactions
 * @property BalanceTransaction[] $balanceTransactions0
 * @property Member[] $member
 */
class BalanceAccount extends \yii\db\ActiveRecord
{

    public static function tableName()
    {
        return '{{%balance_account}}';
    }

    public function rules()
    {
        return [
            [['balance'], 'number'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => Yii::t('db/balanceaccount', 'ID'),
            'balance' => Yii::t('db/balanceaccount', 'Balance'),
        ];
    }

    public function getBalanceTransactions()
    {
        return $this->hasMany(BalanceTransaction::className(), ['account_id' => 'id']);
    }

    public function getBalanceTransactions0()
    {
        return $this->hasMany(BalanceTransaction::className(), ['extra_account_id' => 'id']);
    }

    public function getMember()
    {
        return $this->hasOne(Member::className(), ['account_id' => 'id']);
    }

    public static function find()
    {
        return new BalanceAccountQuery(get_called_class());
    }
}
