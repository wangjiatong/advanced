<?php

use yii\db\Migration;

/**
 * Class m180110_061045_add_column_status_for_table_product
 */
class m180110_061045_add_column_status_for_table_product extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->addColumn('product', 'status', 'tinyint(1) unsigned not null default 1');
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m180110_061045_add_column_status_for_table_product cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180110_061045_add_column_status_for_table_product cannot be reverted.\n";

        return false;
    }
    */
}
