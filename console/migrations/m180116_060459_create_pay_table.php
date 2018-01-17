<?php

use yii\db\Migration;

/**
 * Handles the creation of table `pay`.
 */
class m180116_060459_create_pay_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('pay', [
            'id' => $this->primaryKey(),
            'cid' => $this->integer()->notNull()->defaultValue(0),
            'time' => $this->string(10)->notNull()->defaultValue('0000-00-00'),
            'interest' => $this->decimal(11, 2)->notNull()->defaultValue(0),
        ], 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('pay');
    }
}
