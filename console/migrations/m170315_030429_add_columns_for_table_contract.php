<?php

use yii\db\Migration;

class m170315_030429_add_columns_for_table_contract extends Migration
{
    public function up()
    {
        $this->addColumn('contract', 'raise_interest_year', 'float not null');
        $this->addColumn('contract', 'interest_year', 'float not null');
    }

    public function down()
    {
        echo "m170315_030429_add_columns_for_table_contract cannot be reverted.\n";

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
