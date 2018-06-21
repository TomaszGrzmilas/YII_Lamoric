<?php

use yii\db\Schema;
use yii\db\Migration;

class m180621_151515_token extends Migration
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
            '{{%token}}',
            [
                'user_id'=> $this->integer(11)->notNull(),
                'code'=> $this->string(32)->notNull(),
                'created_at'=> $this->integer(11)->notNull(),
                'type'=> $this->smallInteger(6)->notNull(),
            ],$tableOptions
        );
        $this->createIndex('token_unique','{{%token}}',['user_id','code','type'],true);
        $this->addPrimaryKey('pk_on_token','{{%token}}',['user_id','code','type']);

    }

    public function safeDown()
    {
    $this->dropPrimaryKey('pk_on_token','{{%token}}');
        $this->dropIndex('token_unique', '{{%token}}');
        $this->dropTable('{{%token}}');
    }
}
