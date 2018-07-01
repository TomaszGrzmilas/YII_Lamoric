<?php

use yii\db\Schema;
use yii\db\Migration;

class m180701_163855_Relations extends Migration
{

    public function init()
    {
       $this->db = 'db';
       parent::init();
    }

    public function safeUp()
    {
        $this->addForeignKey('fk_company_logo',
            '{{%company}}','logo',
            '{{%uploaded_file}}','id',
            'NO ACTION','NO ACTION'
         );
        $this->addForeignKey('fk_company_created_by',
            '{{%company}}','created_by',
            '{{%user}}','id',
            'NO ACTION','NO ACTION'
         );
        $this->addForeignKey('fk_company_updated_by',
            '{{%company}}','updated_by',
            '{{%user}}','id',
            'NO ACTION','NO ACTION'
         );
       
    }

    public function safeDown()
    {
        $this->dropForeignKey('fk_company_logo', '{{%company}}');
        $this->dropForeignKey('fk_company_created_by', '{{%company}}');
        $this->dropForeignKey('fk_company_updated_by', '{{%company}}');
        
    }
}
