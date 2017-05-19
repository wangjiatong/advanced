<?php

use yii\db\Migration;

class m170503_060304_add_pdf_column_for_contract extends Migration
{
    public function up()
    {
        $this->addColumn('contract', 'pdf', 'varchar(255)');
    }

    public function down()
    {
        echo "m170503_060304_add_pdf_column_for_contract cannot be reverted.\n";

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
