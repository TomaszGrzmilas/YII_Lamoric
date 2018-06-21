<?php

use yii\db\Schema;
use yii\db\Migration;

class m180621_151507_company extends Migration
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
            '{{%company}}',
            [
                'company_id'=> $this->primaryKey(11),
                'name'=> $this->string(200)->notNull(),
                'logo'=> $this->integer(11)->null()->defaultValue(null),
                'created_by'=> $this->integer(11)->null()->defaultValue(null),
                'created_at'=> $this->integer(11)->null()->defaultValue(null),
                'updated_by'=> $this->integer(11)->null()->defaultValue(null),
                'updated_at'=> $this->integer(11)->null()->defaultValue(null),
            ],$tableOptions
        );
        $this->createIndex('name','{{%company}}',['name'],true);
        $this->createIndex('File','{{%company}}',['logo'],false);
        $this->createIndex('UserCreate','{{%company}}',['created_by'],false);
        $this->createIndex('UserUpdate','{{%company}}',['updated_by'],false);

    }

    public function safeDown()
    {
        $this->dropIndex('name', '{{%company}}');
        $this->dropIndex('File', '{{%company}}');
        $this->dropIndex('UserCreate', '{{%company}}');
        $this->dropIndex('UserUpdate', '{{%company}}');
        $this->dropTable('{{%company}}');
    }
}
