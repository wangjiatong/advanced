<?php

use yii\db\Migration;

class m171024_014122_add_float_for_table_contract extends Migration
{
    public function safeUp()
    {
        $this->addColumn('contract', 'if_float', 'smallint not null default 0');
        $this->addColumn('contract', 'float_interest', 'float default 0');
    }

    public function safeDown()
    {
        echo "m171024_014122_add_float_for_table_contract cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m171024_014122_add_float_for_table_contract cannot be reverted.\n";

        return false;
    }
    */
}
