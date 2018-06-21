<?php

use yii\db\Schema;
use yii\db\Migration;

class m180621_151712_userDataInsert extends Migration
{

    public function init()
    {
        $this->db = 'db';
        parent::init();
    }

    public function safeUp()
    {
        $this->batchInsert('{{%user}}',
                           ["id", "username", "email", "password_hash", "auth_key", "confirmed_at", "unconfirmed_email", "blocked_at", "registration_ip", "created_at", "updated_at", "flags", "last_login_at"],
                            [
    [
        'id' => '1',
        'username' => 'root',
        'email' => 'tomasz.grzmilas@gmail.com',
        'password_hash' => '$2y$10$Onoa0sBj0ltlmo4Pwp.wxuQrb/R7kdSBgR6c7DOIfOrkPlU78o76S',
        'auth_key' => 'HNBhs23GpCKEJQXw5jb3c2Nhl3_FCEZr',
        'confirmed_at' => null,
        'unconfirmed_email' => null,
        'blocked_at' => null,
        'registration_ip' => '127.0.0.1',
        'created_at' => '1529149469',
        'updated_at' => '1529149469',
        'flags' => '0',
        'last_login_at' => '1529594039',
    ],
]
        );
    }

    public function safeDown()
    {
        //$this->truncateTable('{{%user}} CASCADE');
    }
}
