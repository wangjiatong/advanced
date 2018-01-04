<?php

use yii\db\Migration;

/**
 * Class m180103_093312_alter_columns_which_is_float_for_accuracy
 */
class m180103_093312_alter_columns_which_is_float_for_accuracy extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->alterColumn('contract', 'raise_interest', 'decimal(9,2) not null');
        $this->alterColumn('contract', 'interest', 'decimal(11,2) not null');
        $this->alterColumn('contract', 'total_interest', 'decimal(11,2) not null');
        $this->alterColumn('contract', 'total', 'decimal(11,2) not null');
        $this->alterColumn('contract', 'float_interest', 'decimal(11,2) not null');
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m180103_093312_alter_columns_which_is_float_for_accuracy cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180103_093312_alter_columns_which_is_float_for_accuracy cannot be reverted.\n";

        return false;
    }
    */
}
