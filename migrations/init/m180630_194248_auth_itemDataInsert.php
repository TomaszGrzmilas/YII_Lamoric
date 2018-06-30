<?php

use yii\db\Schema;
use yii\db\Migration;

class m180630_194248_auth_itemDataInsert extends Migration
{

    public function init()
    {
        $this->db = 'db';
        parent::init();
    }

    public function safeUp()
    {
        $this->batchInsert('{{%auth_item}}',
                           ["name", "type", "description", "rule_name", "data", "created_at", "updated_at"],
                            [
    [
        'name' => 'Application Admin',
        'type' => '1',
        'description' => 'Administrator aplikacji',
        'rule_name' => null,
        'data' => null,
    ],
    [
        'name' => 'category_delete',
        'type' => '2',
        'description' => 'Usuwanie kategorii',
        'rule_name' => null,
        'data' => null,
    ],
    [
        'name' => 'category_edit',
        'type' => '2',
        'description' => 'Edycja kategorii',
        'rule_name' => null,
        'data' => null,
    ],
    [
        'name' => 'category_insert',
        'type' => '2',
        'description' => 'Dodawanie kategorii',
        'rule_name' => null,
        'data' => null,
    ],
    [
        'name' => 'category_view',
        'type' => '2',
        'description' => 'Przeglądanie kategorii',
        'rule_name' => null,
        'data' => null,
    ],
    [
        'name' => 'user_delete',
        'type' => '2',
        'description' => 'Usuwanie użytkowników',
        'rule_name' => null,
        'data' => null,
    ],
    [
        'name' => 'user_insert',
        'type' => '2',
        'description' => 'Dodawanie nowego użytkownika',
        'rule_name' => null,
        'data' => null,
    ],
    [
        'name' => 'user_update',
        'type' => '2',
        'description' => 'Edycja użytkownika',
        'rule_name' => null,
        'data' => null,
    ],
    [
        'name' => 'user_view',
        'type' => '2',
        'description' => 'Przegląd użytkownika',
        'rule_name' => null,
        'data' => null,
    ],
]
        );
    }

    public function safeDown()
    {
        //$this->truncateTable('{{%auth_item}} CASCADE');
    }
}
