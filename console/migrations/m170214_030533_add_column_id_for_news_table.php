<?php

use yii\db\Migration;

class m170214_030533_add_column_id_for_news_table extends Migration
{
    public function up()
    {
        $this->addColumn('news', 'column_id', 'int(11) not null');
    }

    public function down()
    {
        echo "m170214_030533_add_column_id_for_news_table cannot be reverted.\n";

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
