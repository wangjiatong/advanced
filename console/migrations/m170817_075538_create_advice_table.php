<?php

use yii\db\Migration;

/**
 * Handles the creation of table `advice`.
 */
class m170817_075538_create_advice_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $tableOptions = null;
        if($this->db->driverName === 'mysql')
        {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        $this->createTable('advice', [
            'id' => $this->primaryKey(),
            'to_whom' => $this->integer()->notNull(),
            'if_anonymous' => $this->integer()->notNull(),
            'advice' => $this->text()->notNull(),
        ], $tableOptions);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('advice');
    }
}
