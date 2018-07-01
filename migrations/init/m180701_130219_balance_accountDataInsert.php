<?php

use yii\db\Schema;
use yii\db\Migration;

class m180701_130219_balance_accountDataInsert extends Migration
{

    public function init()
    {
        $this->db = 'db';
        parent::init();
    }

    public function safeUp()
    {
        $this->batchInsert('{{%balance_account}}',
                           ["id", "balance"],
                            [
    [
        'id' => '',
        'balance' => '',
    ],
]
        );
    }

    public function safeDown()
    {
        //$this->truncateTable('{{%balance_account}} CASCADE');
    }
}
