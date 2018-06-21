<?php

use yii\db\Schema;
use yii\db\Migration;

class m180621_151513_profile extends Migration
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
            '{{%profile}}',
            [
                'user_id'=> $this->primaryKey(11),
                'name'=> $this->string(255)->null()->defaultValue(null),
                'public_email'=> $this->string(255)->null()->defaultValue(null),
                'gravatar_email'=> $this->string(255)->null()->defaultValue(null),
                'gravatar_id'=> $this->string(32)->null()->defaultValue(null),
                'location'=> $this->string(255)->null()->defaultValue(null),
                'website'=> $this->string(255)->null()->defaultValue(null),
                'bio'=> $this->text()->null()->defaultValue(null),
                'timezone'=> $this->string(40)->null()->defaultValue(null),
                'company_id'=> $this->integer(11)->null()->defaultValue(null),
            ],$tableOptions
        );
        $this->createIndex('company_id','{{%profile}}',['company_id'],false);

    }

    public function safeDown()
    {
        $this->dropIndex('company_id', '{{%profile}}');
        $this->dropTable('{{%profile}}');
    }
}
