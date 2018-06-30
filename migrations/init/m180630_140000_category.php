<?php

use yii\db\Schema;
use yii\db\Migration;

class m180630_140000_category extends Migration
{

    public $tableName = '{{%category}}';

    public function init()
    {
        $this->db = 'db';
        parent::init();
    }

    public function safeUp()
    {
        if(is_null($this->getDb()->getSchema()->getTableSchema($this->tableName)->getColumn('child_allowed'))) {
            $this->addColumn($this->tableName,  
            'child_allowed',
            "TINYINT(1)   NOT NULL DEFAULT FALSE"
            );
        }
    }

    public function safeDown()
    {
        $this->dropColumn($this->tableName,  
        'child_allowed'
       );
    }
}
