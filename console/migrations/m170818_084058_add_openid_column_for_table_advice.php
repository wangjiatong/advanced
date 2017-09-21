<?php

use yii\db\Migration;

class m170818_084058_add_openid_column_for_table_advice extends Migration
{
    public function safeUp()
    {
        $this->addColumn('advice', 'openid', 'varchar(255) not null');
    }

    public function safeDown()
    {
        $this->dropColumn('advice', 'openid');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170818_084058_add_openid_column_for_table_advice cannot be reverted.\n";

        return false;
    }
    */
}
