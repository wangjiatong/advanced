<?php

use yii\db\Migration;

class m170221_092552_add_columns_for_user_table extends Migration
{
    public function up()
    {
        $this->addColumn('user', 'name', 'varchar(255) not null');
        $this->addColumn('user', 'sex', 'varchar(255) not null');
        $this->addColumn('user', 'birthday', 'varchar(255) not null');
        $this->addColumn('user', 'phone_number', 'varchar(255) not null');
    }

    public function down()
    {
        echo "m170221_092552_add_columns_for_user_table cannot be reverted.\n";

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
