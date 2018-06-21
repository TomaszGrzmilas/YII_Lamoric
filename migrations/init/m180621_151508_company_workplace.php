<?php

use yii\db\Schema;
use yii\db\Migration;

class m180621_151508_company_workplace extends Migration
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
            '{{%company_workplace}}',
            [
                'company_id'=> $this->integer(11)->notNull(),
                'workplace_id'=> $this->integer(11)->notNull(),
                'name'=> $this->string(100)->notNull(),
                'created_at'=> $this->integer(11)->notNull(),
                'updated_at'=> $this->integer(11)->notNull(),
            ],$tableOptions
        );
        $this->createIndex('workplace_id','{{%company_workplace}}',['workplace_id'],false);
        $this->addPrimaryKey('pk_on_company_workplace','{{%company_workplace}}',['company_id','workplace_id']);

    }

    public function safeDown()
    {
    $this->dropPrimaryKey('pk_on_company_workplace','{{%company_workplace}}');
        $this->dropIndex('workplace_id', '{{%company_workplace}}');
        $this->dropTable('{{%company_workplace}}');
    }
}
