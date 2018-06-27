<?php

use yii\db\Schema;
use yii\db\Migration;

class m180627_173724_member extends Migration
{

    public function init()
    {
        $this->db = 'db';
        parent::init();
    }

    public function safeUp()
    {
        $tableOptions = 'ENGINE=InnoDB';

        $this->safeDown();

        $this->createTable(
            '{{%member}}',
            [
                'id'=> Schema::TYPE_PK,
                'name'=> Schema::TYPE_STRING."(100) NOT NULL",
                'surname'=> Schema::TYPE_STRING."(100) NOT NULL",
                'pesel'=> Schema::TYPE_INTEGER."(11) NOT NULL",
                'zip_code'=> Schema::TYPE_STRING."(6) NOT NULL",
                'city'=> Schema::TYPE_STRING."(100) NOT NULL",
                'street'=> Schema::TYPE_STRING."(100) NOT NULL",
                'building'=> Schema::TYPE_STRING."(5) NOT NULL",
                'local'=> Schema::TYPE_STRING."(5) NULL DEFAULT NULL",
                'phone'=> Schema::TYPE_INTEGER."(11) NULL DEFAULT NULL",
                'email'=> Schema::TYPE_STRING."(100) NULL DEFAULT NULL",
                'company_id'=> Schema::TYPE_INTEGER."(11) NOT NULL",
                'workplace_id'=> Schema::TYPE_INTEGER."(11) NULL DEFAULT NULL",
                'notes'=> Schema::TYPE_STRING."(2000) NULL DEFAULT NULL",
                'created_by'=> Schema::TYPE_INTEGER."(11) NOT NULL",
                'created_at'=> Schema::TYPE_INTEGER."(11) NOT NULL",
                'updated_by'=> Schema::TYPE_INTEGER."(11) NOT NULL",
                'updated_at'=> Schema::TYPE_INTEGER."(11) NOT NULL",
            ],$tableOptions
        );
        $this->createIndex('id','{{%member}}',['id'],true);
        $this->createIndex('company_id','{{%member}}',['company_id','workplace_id'],false);
        $this->createIndex('created_by','{{%member}}',['created_by'],false);
        $this->createIndex('updated_by','{{%member}}',['updated_by'],false);

    }

    public function safeDown()
    {
        $this->dropIndex('id', '{{%member}}');
        $this->dropIndex('company_id', '{{%member}}');
        $this->dropIndex('created_by', '{{%member}}');
        $this->dropIndex('updated_by', '{{%member}}');
        $this->dropTable('{{%member}}');
    }
}
