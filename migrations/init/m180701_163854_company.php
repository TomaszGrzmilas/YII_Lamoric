<?php

use yii\db\Schema;
use yii\db\Migration;

class m180701_163854_company extends Migration
{
    public $tableName = '{{%company}}';
    public $columns = [];

    public function init()
    {
        $this->db = 'db';
        parent::init();
    }

    public function safeUp()
    {

        $this->columns = [
            'tax_id'=> Schema::TYPE_STRING."(10) NOT NULL",
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

        $this->createIndex('account_id','{{%company}}',['account_id'],false);
        $this->addForeignKey('fk_company_account_id',
        '{{%company}}','account_id',
        '{{%balance_account}}','id',
        'NO ACTION','NO ACTION'
        );
    }

    public function safeDown()
    {
        $this->dropIndex('account_id', '{{%company}}');
        $this->dropForeignKey('fk_company_account_id', '{{%company}}');
        foreach ($this->columns as $key => $value) {
            $this->dropColumn(
                $this->tableName,        
                $key);
        }
    }
}
