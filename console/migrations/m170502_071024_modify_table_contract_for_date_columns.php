<?php

use yii\db\Migration;

class m170502_071024_modify_table_contract_for_date_columns extends Migration
{
    public function up()
    {
        $this->dropColumn('contract', 'created_at');
        $this->dropColumn('contract', 'updated_at');
        $this->addColumn('contract', 'created_at', 'varchar(255)');
        $this->addColumn('contract', 'updated_at', 'varchar(255)');
    }

    public function down()
    {
        echo "m170502_071024_modify_table_contract_for_date_columns cannot be reverted.\n";

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
