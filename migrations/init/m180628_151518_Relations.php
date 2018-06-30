<?php

use yii\db\Schema;
use yii\db\Migration;

/**
 * Class m180628_151518_Relations
 */
class m180628_151518_Relations extends Migration
{

    public function init()
    {
       $this->db = 'db';
       parent::init();
    }

    public function safeUp()
    {
        $this->addForeignKey('fk_member_created_by',
            '{{%member}}','created_by',
            '{{%user}}','id',
            'RESTRICT','RESTRICT'
        );
        $this->addForeignKey('fk_member_updated_by',
            '{{%member}}','updated_by',
            '{{%user}}','id',
            'RESTRICT','RESTRICT'
        );
    }

    public function safeDown()
    {
        $this->dropForeignKey('fk_member_created_by', '{{%member}}');
        $this->dropForeignKey('fk_member_updated_by', '{{%member}}');
    }
}
