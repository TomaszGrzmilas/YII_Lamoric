<?php

use yii\db\Schema;
use yii\db\Migration;

class m180607_152544_Relations extends Migration
{

    public function init()
    {
       $this->db = 'db';
       parent::init();
    }

    public function safeUp()
    {
        $this->addForeignKey('fk_document_category_id',
            '{{%document}}','category_id',
            '{{%doc_category}}','category_id',
            'RESTRICT','RESTRICT'
         );
        $this->addForeignKey('fk_doc_category_parent_category_id',
            '{{%doc_category}}','parent_category_id',
            '{{%doc_category}}','category_id',
            'RESTRICT','RESTRICT'
         );
    }

    public function safeDown()
    {
        $this->dropForeignKey('fk_document_category_id', '{{%document}}');
        $this->dropForeignKey('fk_doc_category_parent_category_id', '{{%doc_category}}');
    }
}
