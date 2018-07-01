<?php

namespace app\models\balance_account;

use Yii;

/**
 * This is the model class for table "{{%balance_transaction}}".
 *
 * @property int $id
 * @property string $date
 * @property int $account_id
 * @property int $extra_account_id
 * @property double $amount
 * @property string $data
 *
 * @property BalanceAccount $account
 * @property BalanceAccount $extraAccount
 */
class BalanceTransaction extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%balance_transaction}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['date', 'account_id', 'extra_account_id'], 'required'],
            [['date'], 'safe'],
            [['account_id', 'extra_account_id'], 'integer'],
            [['amount'], 'number'],
            [['data'], 'string', 'max' => 2000],
            [['account_id'], 'exist', 'skipOnError' => true, 'targetClass' => BalanceAccount::className(), 'targetAttribute' => ['account_id' => 'id']],
            [['extra_account_id'], 'exist', 'skipOnError' => true, 'targetClass' => BalanceAccount::className(), 'targetAttribute' => ['extra_account_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('db/balancetransaction', 'ID'),
            'date' => Yii::t('db/balancetransaction', 'Date'),
            'account_id' => Yii::t('db/balancetransaction', 'Account ID'),
            'extra_account_id' => Yii::t('db/balancetransaction', 'Extra Account ID'),
            'amount' => Yii::t('db/balancetransaction', 'Amount'),
            'data' => Yii::t('db/balancetransaction', 'Data'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccount()
    {
        return $this->hasOne(BalanceAccount::className(), ['id' => 'account_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getExtraAccount()
    {
        return $this->hasOne(BalanceAccount::className(), ['id' => 'extra_account_id']);
    }

    /**
     * {@inheritdoc}
     * @return BalanceTransactionQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new BalanceTransactionQuery(get_called_class());
    }
}
