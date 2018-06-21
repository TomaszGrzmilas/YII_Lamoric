<?php

use yii\db\Schema;
use yii\db\Migration;

class m180621_151516_uploaded_file extends Migration
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
            '{{%uploaded_file}}',
            [
                'id'=> $this->primaryKey(11),
                'name'=> $this->string(255)->null()->defaultValue(null),
                'filename'=> $this->string(255)->null()->defaultValue(null),
                'size'=> $this->integer(11)->null()->defaultValue(null),
                'type'=> $this->string(64)->null()->defaultValue(null),
            ],$tableOptions
        );

    }

    public function safeDown()
    {
        $this->dropTable('{{%uploaded_file}}');
    }
}
