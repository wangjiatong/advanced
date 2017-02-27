<?php

use yii\db\Migration;

class m170224_073630_create_table_contract extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if($this->db->driverName === 'mysql')
        {
            $tableOptions = "CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB";
        }
        $this->createTable('contract', [
            'id' => $this->primaryKey(),
            'contract_number' => $this->string()->notNull()->unique(),
            'capital' => $this->integer()->notNull(),
            'transfered_time' => $this->dateTime()->notNull(),
            'found_time' => $this->dateTime()->notNull(),
            'raise_day' => $this->integer()->notNull(),
            'raise_interest' => $this->integer()->notNull(),
            'cash_time' => $this->dateTime()->notNull(),
            'term_month' => $this->integer()->notNull(),
            'interest' => $this->integer()->notNull(),
            'term' => $this->integer()->notNull(),
            'every_time' => $this->string()->notNull(),
            'every_interest' => $this->string()->notNull(),
            'total_interest' => $this->integer()->notNull(),
            'total' => $this->integer()->notNull(),
            'bank' => $this->string()->notNull(),
            'bank_number' => $this->string()->notNull(),
            'source' => $this->string(),
            'created_at' => $this->dateTime()->notNull(),
            'updated_at' => $this->dateTime()->notNull(),         
            'product_id' => $this->integer()->notNull(),
            'user_id' => $this->integer()->notNull(),
            'status' => $this->smallInteger()->notNull()->defaultValue(1),
        ], $tableOptions);
        
        $this->addForeignKey('fk-contract-to-product', 'contract', 'product_id', 'product', 'id');
        
        $this->addForeignKey('fk-user-to-product', 'contract', 'user_id', 'user', 'id');
        
        
    }

    public function down()
    {
        return $this->dropTable('contract');

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
