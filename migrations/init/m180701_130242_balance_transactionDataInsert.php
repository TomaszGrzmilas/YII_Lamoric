<?php

use yii\db\Schema;
use yii\db\Migration;

class m180701_130242_balance_transactionDataInsert extends Migration
{

    public function init()
    {
        $this->db = 'db';
        parent::init();
    }

    public function safeUp()
    {
        $this->batchInsert('{{%balance_transaction}}',
                           ["id", "date", "account_id", "extra_account_id", "amount", "data"],
                            [
    [
        'id' => '',
        'date' => '',
        'account_id' => '',
        'extra_account_id' => '',
        'amount' => '',
        'data' => '',
    ],
]
        );
    }

    public function safeDown()
    {
        //$this->truncateTable('{{%balance_transaction}} CASCADE');
    }
}
