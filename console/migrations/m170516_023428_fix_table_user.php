<?php

use yii\db\Migration;

class m170516_023428_fix_table_user extends Migration
{
    public function up()
    {
        $this->dropColumn('user', 'soruce');
        $this->addColumn('user', 'source', 'INTEGER NOT NULL');
    }

    public function down()
    {
        echo "m170516_023428_fix_table_user cannot be reverted.\n";

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
