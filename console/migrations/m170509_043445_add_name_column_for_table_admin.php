<?php

use yii\db\Migration;

class m170509_043445_add_name_column_for_table_admin extends Migration
{
    public function up()
    {
        return $this->addColumn('admin', 'name', 'VARCHAR(20) NOT NULL');
    }

    public function down()
    {
        echo "m170509_043445_add_name_column_for_table_admin cannot be reverted.\n";

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
