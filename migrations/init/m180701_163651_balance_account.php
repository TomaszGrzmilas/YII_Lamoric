<?php

use yii\db\Schema;
use yii\db\Migration;
use app\components\LogBehavior;

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
    }

    public function safeDown()
    {
        $this->dropIndex('id', $this->tableName);
        $this->dropTable($this->tableName);
    }
}
