<?php

use yii\db\Migration;

/**
 * Class m180117_063923_add_uid_and_source_column_for_table_pay
 */
class m180117_063923_add_uid_and_source_column_for_table_pay extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->addColumn('pay', 'uid', 'int unsigned not null default 0');
        $this->addColumn('pay', 'source', 'int unsigned not null default 0');
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m180117_063923_add_uid_and_source_column_for_table_pay cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180117_063923_add_uid_and_source_column_for_table_pay cannot be reverted.\n";

        return false;
    }
    */
}
