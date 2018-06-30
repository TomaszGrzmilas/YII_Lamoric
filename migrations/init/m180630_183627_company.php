<?php

use yii\db\Schema;
use yii\db\Migration;

class m180630_183627_company extends Migration
{
    public $tableName = '{{%company}}';
    public $columns = [
        'zip_code' => Schema::TYPE_STRING."(6) NULL DEFAULT NULL",
        'city' =>  Schema::TYPE_STRING."(100) NULL DEFAULT NULL",
        'street' =>  Schema::TYPE_STRING."(100) NULL DEFAULT NULL",
        'building'=> Schema::TYPE_STRING."(5) NULL DEFAULT NULL",
        'local'=> Schema::TYPE_STRING."(5) NULL DEFAULT NULL",
        'notes'=> Schema::TYPE_STRING."(2000) NULL DEFAULT NULL",
        'created_by'=> Schema::TYPE_INTEGER."(11) NULL DEFAULT NULL",
        'created_at'=> Schema::TYPE_INTEGER."(11) NULL DEFAULT NULL",
        'updated_by'=> Schema::TYPE_INTEGER."(11) NULL DEFAULT NULL",
        'updated_at'=> Schema::TYPE_INTEGER."(11) NULL DEFAULT NULL",
    ];

    public function init()
    {
        $this->db = 'db';
        parent::init();
    }

    public function safeUp()
    {
        foreach ($this->columns as $key => $value) {
            if(is_null($this->getDb()->getSchema()->getTableSchema($this->tableName)->getColumn($key ))) {
                $this->addColumn(
                    $this->tableName,              
                        $key ,
                        $value);     
            }
        }
    
    }

    public function safeDown()
    {
        foreach ($this->columns as $key => $value) {
            $this->dropColumn(
                $this->tableName,        
                $key);
        }
    }
}
