<?php

use yii\db\Schema;
use yii\db\Migration;

class m180621_151514_social_account extends Migration
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
            '{{%social_account}}',
            [
                'id'=> $this->primaryKey(11),
                'user_id'=> $this->integer(11)->null()->defaultValue(null),
                'provider'=> $this->string(255)->notNull(),
                'client_id'=> $this->string(255)->notNull(),
                'data'=> $this->text()->null()->defaultValue(null),
                'code'=> $this->string(32)->null()->defaultValue(null),
                'created_at'=> $this->integer(11)->null()->defaultValue(null),
                'email'=> $this->string(255)->null()->defaultValue(null),
                'username'=> $this->string(255)->null()->defaultValue(null),
            ],$tableOptions
        );
        $this->createIndex('account_unique','{{%social_account}}',['provider','client_id'],true);
        $this->createIndex('account_unique_code','{{%social_account}}',['code'],true);
        $this->createIndex('fk_user_account','{{%social_account}}',['user_id'],false);

    }

    public function safeDown()
    {
        $this->dropIndex('account_unique', '{{%social_account}}');
        $this->dropIndex('account_unique_code', '{{%social_account}}');
        $this->dropIndex('fk_user_account', '{{%social_account}}');
        $this->dropTable('{{%social_account}}');
    }
}
