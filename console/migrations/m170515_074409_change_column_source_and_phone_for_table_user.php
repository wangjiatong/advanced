<?php

use yii\db\Migration;

class m170515_074409_change_column_source_and_phone_for_table_user extends Migration
{
    public function up()
    {
        $this->dropColumn('user', 'phone_number');
        $this->dropColumn('user', 'source');
        $this->addColumn('user', 'phone_number', 'VARCHAR(30)');
        $this->addColumn('user', 'soruce', 'INTEGER NOT NULL');
    }

    public function down()
    {
        echo "m170515_074409_change_column_source_and_phone_for_table_user cannot be reverted.\n";

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
