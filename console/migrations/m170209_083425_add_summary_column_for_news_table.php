<?php

use yii\db\Migration;

class m170209_083425_add_summary_column_for_news_table extends Migration
{
    public function up()
    {
        $this->addColumn('news', 'summary', 'varchar(255) not null');
    }

    public function down()
    {
        echo "m170209_083425_add_summary_column_for_news_table cannot be reverted.\n";

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
