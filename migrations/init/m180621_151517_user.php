<?php

use yii\db\Schema;
use yii\db\Migration;

class m180621_151517_user extends Migration
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
            '{{%user}}',
            [
                'id'=> $this->primaryKey(11),
                'username'=> $this->string(255)->notNull(),
                'email'=> $this->string(255)->notNull(),
                'password_hash'=> $this->string(60)->notNull(),
                'auth_key'=> $this->string(32)->notNull(),
                'confirmed_at'=> $this->integer(11)->null()->defaultValue(null),
                'unconfirmed_email'=> $this->string(255)->null()->defaultValue(null),
                'blocked_at'=> $this->integer(11)->null()->defaultValue(null),
                'registration_ip'=> $this->string(45)->null()->defaultValue(null),
                'created_at'=> $this->integer(11)->notNull(),
                'updated_at'=> $this->integer(11)->notNull(),
                'flags'=> $this->integer(11)->notNull()->defaultValue(0),
                'last_login_at'=> $this->integer(11)->null()->defaultValue(null),
            ],$tableOptions
        );
        $this->createIndex('user_unique_username','{{%user}}',['username'],true);
        $this->createIndex('user_unique_email','{{%user}}',['email'],true);

    }

    public function safeDown()
    {
        $this->dropIndex('user_unique_username', '{{%user}}');
        $this->dropIndex('user_unique_email', '{{%user}}');
        $this->dropTable('{{%user}}');
    }
}
