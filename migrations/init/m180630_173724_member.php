<?php

use yii\db\Schema;
use yii\db\Migration;

class m180630_173724_member extends Migration
{
    public $tableName = '{{%member}}';

    public function init()
    {
        $this->db = 'db';
        parent::init();
    }

    public function safeUp()
    {
        if(is_null($this->getDb()->getSchema()->getTableSchema($this->tableName)->getColumn('created_by'))) {
            $this->addColumn(
                $this->tableName,              
                'created_by',
                Schema::TYPE_INTEGER."(11)");
            $this->createIndex('created_by', $this->tableName,   ['created_by'],false);
            $this->addForeignKey('fk_member_created_by',
            $this->tableName, 
            'created_by',
            '{{%user}}','id',
            'RESTRICT','RESTRICT'
        );
        }

        if(is_null($this->getDb()->getSchema()->getTableSchema($this->tableName)->getColumn('created_by'))) {
            $this->addColumn(
                $this->tableName,              
                    'updated_by',
                    Schema::TYPE_INTEGER."(11)");
            $this->createIndex('updated_by', $this->tableName,   ['updated_by'],false);    
            $this->addForeignKey('fk_member_updated_by',
            $this->tableName,   
            '{{%user}}','id',
            'RESTRICT','RESTRICT'
        );     
        }
    }

    public function safeDown()
    {
        $this->dropColumn(
            $this->tableName,        
            'created_by');

        $this->dropColumn(
            $this->tableName,             
                'updated_by');      
                
        $this->dropIndex('created_by', $this->tableName);
        $this->dropIndex('updated_by', $this->tableName);
        $this->dropForeignKey('fk_member_created_by', '{{%member}}');
        $this->dropForeignKey('fk_member_updated_by', '{{%member}}');

    }
}
