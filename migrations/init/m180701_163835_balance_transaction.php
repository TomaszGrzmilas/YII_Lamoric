<?php

use yii\db\Schema;
use yii\db\Migration;

class m180701_163835_balance_transaction extends Migration
{

    public function init()
    {
        $this->db = 'db';
        parent::init();
    }

    public function safeUp()
    {
        $tableOptions = 'ENGINE=InnoDB';

        $this->createTable(
            '{{%balance_transaction}}',
            [
                'id'=> $this->primaryKey(11),
                'date'=> $this->date()->notNull(),
                'account_id'=> $this->integer(11)->notNull(),
                'extra_account_id'=> $this->integer(11)->notNull(),
                'amount'=> $this->float()->notNull()->defaultValue("0"),
                'data'=> $this->string(2000)->null()->defaultValue(null),
            ],$tableOptions
        );
        $this->createIndex('id','{{%balance_transaction}}',['id'],true);
        $this->createIndex('account_id','{{%balance_transaction}}',['account_id'],false);
        $this->createIndex('extra_account_id','{{%balance_transaction}}',['extra_account_id'],false);

        $this->addForeignKey('fk_balance_transaction_account_id',
        '{{%balance_transaction}}','account_id',
        '{{%balance_account}}','id',
        'NO ACTION','NO ACTION'
        );
        
        $this->addForeignKey('fk_balance_transaction_extra_account_id',
            '{{%balance_transaction}}','extra_account_id',
            '{{%balance_account}}','id',
            'NO ACTION','NO ACTION'
        );
    }

    public function safeDown()
    {
        $this->dropIndex('id', '{{%balance_transaction}}');
        $this->dropIndex('account_id', '{{%balance_transaction}}');
        $this->dropIndex('extra_account_id', '{{%balance_transaction}}');
        $this->dropForeignKey('fk_balance_transaction_account_id', '{{%balance_transaction}}');
        $this->dropForeignKey('fk_balance_transaction_extra_account_id', '{{%balance_transaction}}');
        $this->dropTable('{{%balance_transaction}}');
    }
}
