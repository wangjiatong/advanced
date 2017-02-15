<?php

use yii\db\Migration;

class m170214_052312_drop_column_column_for_news_tables extends Migration
{
    public function up()
    {
        return $this->dropColumn('news', 'column');
    }

    public function down()
    {
        echo "m170214_052312_drop_column_column_for_news_tables cannot be reverted.\n";

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
