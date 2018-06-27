<?php

use yii\db\Schema;
use yii\db\Migration;

class m180621_151518_Relations extends Migration
{

    public function init()
    {
       $this->db = 'db';
       parent::init();
    }

    public function safeUp()
    {
        $this->safeDown();
        
        $this->addForeignKey('fk_auth_assignment_item_name',
            '{{%auth_assignment}}','item_name',
            '{{%auth_item}}','name',
            'RESTRICT','RESTRICT'
         );
        $this->addForeignKey('fk_auth_item_rule_name',
            '{{%auth_item}}','rule_name',
            '{{%auth_rule}}','name',
            'RESTRICT','RESTRICT'
         );
        $this->addForeignKey('fk_auth_item_child_parent',
            '{{%auth_item_child}}','parent',
            '{{%auth_item}}','name',
            'RESTRICT','RESTRICT'
         );
        $this->addForeignKey('fk_auth_item_child_child',
            '{{%auth_item_child}}','child',
            '{{%auth_item}}','name',
            'RESTRICT','RESTRICT'
         );
        $this->addForeignKey('fk_company_logo',
            '{{%company}}','logo',
            '{{%uploaded_file}}','id',
            'RESTRICT','RESTRICT'
         );
        $this->addForeignKey('fk_company_created_by',
            '{{%company}}','created_by',
            '{{%user}}','id',
            'RESTRICT','RESTRICT'
         );
        $this->addForeignKey('fk_company_updated_by',
            '{{%company}}','updated_by',
            '{{%user}}','id',
            'RESTRICT','RESTRICT'
         );
        $this->addForeignKey('fk_company_workplace_company_id',
            '{{%company_workplace}}','company_id',
            '{{%company}}','company_id',
            'RESTRICT','RESTRICT'
         );
        $this->addForeignKey('fk_document_file',
            '{{%document}}','file',
            '{{%uploaded_file}}','id',
            'RESTRICT','RESTRICT'
         );
        $this->addForeignKey('fk_document_category_id',
            '{{%document}}','category_id',
            '{{%category}}','id',
            'RESTRICT','RESTRICT'
         );
         $this->addForeignKey('fk_member_workplace_id',
         '{{%member}}','workplace_id',
         '{{%company_workplace}}','workplace_id',
         'RESTRICT','RESTRICT'
        );
        $this->addForeignKey('fk_member_company_id',
            '{{%member}}','company_id',
            '{{%company}}','company_id',
            'RESTRICT','RESTRICT'
        );
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
        $this->addForeignKey('fk_profile_user_id',
            '{{%profile}}','user_id',
            '{{%user}}','id',
            'RESTRICT','RESTRICT'
         );
        $this->addForeignKey('fk_profile_company_id',
            '{{%profile}}','company_id',
            '{{%company}}','company_id',
            'RESTRICT','RESTRICT'
         );
        $this->addForeignKey('fk_social_account_user_id',
            '{{%social_account}}','user_id',
            '{{%user}}','id',
            'RESTRICT','RESTRICT'
         );
        $this->addForeignKey('fk_token_user_id',
            '{{%token}}','user_id',
            '{{%user}}','id',
            'RESTRICT','RESTRICT'
         );
    }

    public function safeDown()
    {
        $this->dropForeignKey('fk_auth_assignment_item_name', '{{%auth_assignment}}');
        $this->dropForeignKey('fk_auth_item_rule_name', '{{%auth_item}}');
        $this->dropForeignKey('fk_auth_item_child_parent', '{{%auth_item_child}}');
        $this->dropForeignKey('fk_auth_item_child_child', '{{%auth_item_child}}');
        $this->dropForeignKey('fk_company_logo', '{{%company}}');
        $this->dropForeignKey('fk_company_created_by', '{{%company}}');
        $this->dropForeignKey('fk_company_updated_by', '{{%company}}');
        $this->dropForeignKey('fk_company_workplace_company_id', '{{%company_workplace}}');
        $this->dropForeignKey('fk_document_file', '{{%document}}');
        $this->dropForeignKey('fk_document_category_id', '{{%document}}');
        $this->dropForeignKey('fk_member_workplace_id', '{{%member}}');
        $this->dropForeignKey('fk_member_company_id', '{{%member}}');
        $this->dropForeignKey('fk_member_created_by', '{{%member}}');
        $this->dropForeignKey('fk_member_updated_by', '{{%member}}');
        $this->dropForeignKey('fk_profile_user_id', '{{%profile}}');
        $this->dropForeignKey('fk_profile_company_id', '{{%profile}}');
        $this->dropForeignKey('fk_social_account_user_id', '{{%social_account}}');
        $this->dropForeignKey('fk_token_user_id', '{{%token}}');
    }
}
