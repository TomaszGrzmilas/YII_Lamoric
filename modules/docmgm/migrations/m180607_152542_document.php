<?php

use yii\db\Schema;
use yii\db\Migration;

class m180607_152542_document extends Migration
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
            '{{%document}}',
            [
                'doc_id'=> $this->primaryKey(11),
                'title'=> $this->string(150)->notNull(),
                'text'=> $this->text()->notNull(),
                'tag'=> $this->string(200)->null()->defaultValue(null),
                'file'=> $this->string(65)->null()->defaultValue(null),
                'category_id'=> $this->integer(11)->null()->defaultValue(null),
                'created_at'=> $this->integer(11)->null()->defaultValue(null),
                'updated_at'=> $this->integer(11)->null()->defaultValue(null),
            ],$tableOptions
        );
        $this->createIndex('category_id','{{%document}}',['category_id'],false);

    }

    public function safeDown()
    {
        $this->dropIndex('category_id', '{{%document}}');
        $this->dropTable('{{%document}}');
    }
}
