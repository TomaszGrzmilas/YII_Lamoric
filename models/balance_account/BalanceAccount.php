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
 * @property BalanceTransaction[] $transactions
 * @property BalanceTransaction[] $extraTransactions
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

    public function chargeContribution()
    {
        $now = new \DateTime('now');
        $paymentTitle = "Składka za " . Yii::$app->CustomUtil->translateMonth($now) . " ". $now->format('Y') ;
        $this->chargeAccount($this->member->contribution, $paymentTitle);
    }

    public function chargeAccount($amount, $paymentTitle)
    {
        $transaction = Yii::$app->db->beginTransaction();
        try {
            Yii::$app->balanceManager->decrease($this->id, $amount, ['data' => $paymentTitle]); 
            $this->balance += Yii::$app->balanceManager->calculateBalance($this->id);

            if (!$this->save()) {
                $transaction->rollback();
            }
            $transaction->commit();

        } catch (Exception $ex) {
            $transaction->rollback();
        }
    }

    public function getTransactions()
    {
        return $this->hasMany(BalanceTransaction::className(), ['account_id' => 'id']);
    }

    public function getExtraTransactions()
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
