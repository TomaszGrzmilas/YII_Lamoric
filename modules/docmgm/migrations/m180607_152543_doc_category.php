<?php

use yii\db\Schema;
use yii\db\Migration;

class m180607_152543_doc_category extends Migration
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
            '{{%doc_category}}',
            [
                'category_id'=> $this->primaryKey(11),
                'name'=> $this->string(150)->notNull(),
                'parent_category_id'=> $this->integer(11)->null()->defaultValue(null),
                'created_at'=> $this->integer(11)->null()->defaultValue(null),
                'updated_at'=> $this->integer(11)->null()->defaultValue(null),
            ],$tableOptions
        );
        $this->createIndex('parent_category_id','{{%doc_category}}',['parent_category_id'],false);

    }

    public function safeDown()
    {
        $this->dropIndex('parent_category_id', '{{%doc_category}}');
        $this->dropTable('{{%doc_category}}');
    }
}
