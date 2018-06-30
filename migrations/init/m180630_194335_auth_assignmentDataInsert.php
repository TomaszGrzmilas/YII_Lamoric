<?php

use yii\db\Schema;
use yii\db\Migration;

class m180630_194335_auth_assignmentDataInsert extends Migration
{

    public function init()
    {
        $this->db = 'db';
        parent::init();
    }

    public function safeUp()
    {
        $this->batchInsert('{{%auth_assignment}}',
                           ["item_name", "user_id", "created_at"],
                            [
    [
        'item_name' => 'Application Admin',
        'user_id' => '1',
    ],
]
        );
    }

    public function safeDown()
    {
        //$this->truncateTable('{{%auth_assignment}} CASCADE');
    }
}
