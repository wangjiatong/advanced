<?php

use yii\db\Migration;

class m170527_075712_add_column_for_contract extends Migration
{
    public function up()
    {
        $this->addColumn('contract', 'bank_user', 'varchar(20) not null');
    }

    public function down()
    {
        echo "m170527_075712_add_column_for_contract cannot be reverted.\n";

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
