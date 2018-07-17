<?php

use yii\db\Schema;
use yii\db\Migration;

class m180716_205425_event extends Migration
{
    public $tableName = '{{%event}}';
    public $columns = [];

    public function init()
    {
        $this->db = 'db';
        parent::init();
    }

    public function safeUp()
    {
        $tableOptions = 'ENGINE=InnoDB';

        $this->columns = [
            'event_id'=> Schema::TYPE_PK,
            'title'=> Schema::TYPE_STRING."(200) NULL DEFAULT NULL",
            'body'=> Schema::TYPE_STRING."(2000) NULL DEFAULT NULL",
            'start'=> Schema::TYPE_DATETIME." NULL DEFAULT NULL",
            'end'=> Schema::TYPE_DATETIME." NULL DEFAULT NULL",
            'all_day'=> Schema::TYPE_TINYINT."(1) NULL DEFAULT 0",
            'color'=> Schema::TYPE_STRING."(10) NULL DEFAULT NULL",
        ];

        $this->createTable(
            $this->tableName, $this->columns, $tableOptions
        );

    }

    public function safeDown()
    {
        $this->dropTable('{{%event}}');
    }
}
