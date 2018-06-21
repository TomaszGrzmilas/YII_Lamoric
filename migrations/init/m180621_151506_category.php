<?php

use yii\db\Schema;
use yii\db\Migration;

class m180621_151506_category extends Migration
{

    public function init()
    {
        $this->db = 'db';
        parent::init();
    }

    public function safeUp()
    {
        $tableOptions = 'ENGINE=InnoDB';

        $this->createTable(
            '{{%category}}',
            [
                'id'=> $this->primaryKey(11)->comment('Unique tree node identifier'),
                'root'=> $this->integer(11)->null()->defaultValue(null)->comment('Tree root identifier'),
                'lft'=> $this->integer(11)->notNull()->comment('Nested set left property'),
                'rgt'=> $this->integer(11)->notNull()->comment('Nested set right property'),
                'lvl'=> $this->smallInteger(5)->notNull()->comment('Nested set level / depth'),
                'name'=> $this->string(60)->notNull()->comment('The tree node name / label'),
                'icon'=> $this->string(255)->null()->defaultValue(null)->comment('The icon to use for the node'),
                'icon_type'=> $this->tinyint(1)->notNull()->defaultValue(1)->comment('Icon Type: 1 = CSS Class, 2 = Raw Markup'),
                'active'=> $this->tinyint(1)->notNull()->defaultValue(1)->comment('Whether the node is active (will be set to false on deletion)'),
                'selected'=> $this->tinyint(1)->notNull()->defaultValue(0)->comment('Whether the node is selected/checked by default'),
                'disabled'=> $this->tinyint(1)->notNull()->defaultValue(0)->comment('Whether the node is enabled'),
                'readonly'=> $this->tinyint(1)->notNull()->defaultValue(0)->comment('Whether the node is read only (unlike disabled - will allow toolbar actions)'),
                'visible'=> $this->tinyint(1)->notNull()->defaultValue(1)->comment('Whether the node is visible'),
                'collapsed'=> $this->tinyint(1)->notNull()->defaultValue(0)->comment('Whether the node is collapsed by default'),
                'movable_u'=> $this->tinyint(1)->notNull()->defaultValue(1)->comment('Whether the node is movable one position up'),
                'movable_d'=> $this->tinyint(1)->notNull()->defaultValue(1)->comment('Whether the node is movable one position down'),
                'movable_l'=> $this->tinyint(1)->notNull()->defaultValue(1)->comment('Whether the node is movable to the left (from sibling to parent)'),
                'movable_r'=> $this->tinyint(1)->notNull()->defaultValue(1)->comment('Whether the node is movable to the right (from sibling to child)'),
                'removable'=> $this->tinyint(1)->notNull()->defaultValue(1)->comment('Whether the node is removable (any children below will be moved as siblings before deletion)'),
                'removable_all'=> $this->tinyint(1)->notNull()->defaultValue(0)->comment('Whether the node is removable along with descendants'),
                'created_at'=> $this->integer(11)->notNull(),
                'updated_at'=> $this->integer(11)->notNull(),
            ],$tableOptions
        );
        $this->createIndex('tbl_tree_NK1','{{%category}}',['root'],false);
        $this->createIndex('tbl_tree_NK2','{{%category}}',['lft'],false);
        $this->createIndex('tbl_tree_NK3','{{%category}}',['rgt'],false);
        $this->createIndex('tbl_tree_NK4','{{%category}}',['lvl'],false);
        $this->createIndex('tbl_tree_NK5','{{%category}}',['active'],false);

    }

    public function safeDown()
    {
        $this->dropIndex('tbl_tree_NK1', '{{%category}}');
        $this->dropIndex('tbl_tree_NK2', '{{%category}}');
        $this->dropIndex('tbl_tree_NK3', '{{%category}}');
        $this->dropIndex('tbl_tree_NK4', '{{%category}}');
        $this->dropIndex('tbl_tree_NK5', '{{%category}}');
        $this->dropTable('{{%category}}');
    }
}
