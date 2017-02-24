<?php

use yii\db\Migration;

class m170223_025032_create_table_product extends Migration
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
                    'raise_interest_year' => $this->float(2,2),
                    'interest_year' => $this->float(2,2),
                    'product_column_id' => $this->integer(),
                ]
                , $tableOptions);
    }

    public function down()
    {
        echo "m170223_025032_create_table_product cannot be reverted.\n";

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
