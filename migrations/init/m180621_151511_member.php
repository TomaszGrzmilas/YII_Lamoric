<?php

use yii\db\Schema;
use yii\db\Migration;

class m180621_151511_member extends Migration
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
            '{{%member}}',
            [
                'id'=> $this->primaryKey(11),
                'name'=> $this->string(100)->notNull(),
                'surname'=> $this->string(100)->notNull(),
                'pesel'=> $this->integer(11)->notNull(),
                'zip_code'=> $this->string(6)->notNull(),
                'city'=> $this->string(100)->notNull(),
                'street'=> $this->string(100)->notNull(),
                'building'=> $this->string(5)->notNull(),
                'local'=> $this->string(5)->null()->defaultValue(null),
                'phone'=> $this->integer(11)->null()->defaultValue(null),
                'email'=> $this->string(100)->null()->defaultValue(null),
                'company_id'=> $this->integer(11)->notNull(),
                'workplace_id'=> $this->integer(11)->null()->defaultValue(null),
                'notes'=> $this->string(2000)->null()->defaultValue(null),
                'created_at'=> $this->integer(11)->notNull(),
                'updated_at'=> $this->integer(11)->notNull(),
            ],$tableOptions
        );
        $this->createIndex('id','{{%member}}',['id'],true);
        $this->createIndex('company_id','{{%member}}',['company_id','workplace_id'],false);

    }

    public function safeDown()
    {
        $this->dropIndex('id', '{{%member}}');
        $this->dropIndex('company_id', '{{%member}}');
        $this->dropTable('{{%member}}');
    }
}
