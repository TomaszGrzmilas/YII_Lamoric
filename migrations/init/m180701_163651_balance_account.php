<?php

use yii\db\Schema;
use yii\db\Migration;

class m180701_163651_balance_account extends Migration
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
            '{{%balance_account}}',
            [
                'id'=> $this->primaryKey(11),
                'balance'=> $this->float()->notNull()->defaultValue("0"),
            ],$tableOptions
        );
        $this->createIndex('id','{{%balance_account}}',['id'],true);

    }

    public function safeDown()
    {
        $this->dropIndex('id', '{{%balance_account}}');
        $this->dropTable('{{%balance_account}}');
    }
}
