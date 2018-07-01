<?php

use yii\db\Schema;
use yii\db\Migration;

class m180701_163844_member extends Migration
{
    public $tableName = '{{%member}}';
    public $columns = [];

    public function init()
    {
        $this->db = 'db';
        parent::init();
    }

    public function safeUp()
    {
        $this->columns = [
            'account_id'=> Schema::TYPE_INTEGER."(11) NULL DEFAULT NULL",
            'contribution'=> Schema::TYPE_FLOAT." NOT NULL DEFAULT 40",
        ];

        foreach ($this->columns as $key => $value) {
            if(is_null($this->getDb()->getSchema()->getTableSchema($this->tableName)->getColumn($key ))) {
                $this->addColumn(
                    $this->tableName,              
                        $key ,
                        $value);     
            }
        }

        $this->createIndex('account_id','{{%member}}',['account_id'],false);
        $this->addForeignKey('fk_member_account_id',
        '{{%member}}','account_id',
        '{{%balance_account}}','id',
        'NO ACTION','NO ACTION'
        );
    }

    public function safeDown()
    {
        $this->dropIndex('account_id', '{{%member}}');
        $this->dropForeignKey('fk_member_account_id', '{{%member}}');
        foreach ($this->columns as $key => $value) {
            $this->dropColumn(
                $this->tableName,        
                $key);
        }
        
    }
}
