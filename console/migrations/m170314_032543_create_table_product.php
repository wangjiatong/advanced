<?php

use yii\db\Migration;

class m170314_032543_create_table_product extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if($this->db->driverName === 'mysql')
        {
            $tableOptions = "CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB";            
        }
        
        $this->createTable('product', 
                [
                    'id' => $this->primaryKey(),
                    'product_name' => $this->string()->notNull()->unique(),
                    'product_column_id' => $this->integer(),
                    'content' => $this->text(),
                ]
                , $tableOptions);
    }

    public function down()
    {
        $this->dropTable('product');

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
