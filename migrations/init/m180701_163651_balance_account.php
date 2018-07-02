<?php

use yii\db\Schema;
use yii\db\Migration;

class m180701_163651_balance_account extends Migration
{
    public $tableName = '{{%balance_account}}';

    public function init()
    {
        $this->db = 'db';
        parent::init();
    }

    public function safeUp()
    {
        $tableOptions = 'ENGINE=InnoDB';

        if(is_null($this->getDb()->getSchema()->getTableSchema($this->tableName))) {
            $this->createTable(
                $this->tableName,
                [
                    'id'=> $this->primaryKey(11),
                    'balance'=> $this->float()->notNull()->defaultValue("0"),
                ],$tableOptions
            );
            $this->createIndex('id',$this->tableName,['id'],true);
        }

        $model = new \app\models\member\Member();
        $result = $model->find()->where(['account_id' => null])->all();

        foreach ($result as $key => $value) {
            $account = new \app\models\balance_account\BalanceAccount();
            $account->balance = 0;
            if ($account->save())
            {
                $value->account_id = $account->id;
                $value->save();
            } else {
                throw new UserException(Yii::t('app','Error when creating user account. Try again.'));
            }
        }
    }

    public function safeDown()
    {
        $this->dropIndex('id', $this->tableName);
        $this->dropTable($this->tableName);
    }
}
