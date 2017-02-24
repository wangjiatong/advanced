<?php

use yii\db\Migration;

class m170223_025024_create_table_product_column extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if($this->db->driverName === 'mysql')
        {
            $tableOptions = "CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB";
        }
        
        $this->createTable('product_column', 
                [
                    'id' => $this->primaryKey(),
                    'product_column' => $this->string()->notNull()->unique(),
                ], $tableOptions);
    }

    public function down()
    {
        echo "m170223_025024_create_table_product_column cannot be reverted.\n";

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
