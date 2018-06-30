<?php

use yii\db\Schema;
use yii\db\Migration;

class m180630_194357_auth_item_childDataInsert extends Migration
{

    public function init()
    {
        $this->db = 'db';
        parent::init();
    }

    public function safeUp()
    {
        $this->batchInsert('{{%auth_item_child}}',
                           ["parent", "child"],
                            [
    [
        'parent' => 'Application Admin',
        'child' => 'category_delete',
    ],
    [
        'parent' => 'Application Admin',
        'child' => 'category_edit',
    ],
    [
        'parent' => 'Application Admin',
        'child' => 'category_insert',
    ],
    [
        'parent' => 'Application Admin',
        'child' => 'category_view',
    ],
    [
        'parent' => 'Application Admin',
        'child' => 'user_delete',
    ],
    [
        'parent' => 'Application Admin',
        'child' => 'user_insert',
    ],
    [
        'parent' => 'Application Admin',
        'child' => 'user_update',
    ],
    [
        'parent' => 'Application Admin',
        'child' => 'user_view',
    ],
]
        );
    }

    public function safeDown()
    {
        //$this->truncateTable('{{%auth_item_child}} CASCADE');
    }
}
