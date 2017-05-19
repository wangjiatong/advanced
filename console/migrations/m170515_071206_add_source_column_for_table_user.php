<?php

use yii\db\Migration;

class m170515_071206_add_source_column_for_table_user extends Migration
{
    public function up()
    {
        $this->addColumn('user', 'source', 'integer');
    }

    public function down()
    {
        echo "m170515_071206_add_source_column_for_table_user cannot be reverted.\n";

        return false;
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
