<?php

use yii\db\Migration;

class m170807_021444_create_table_user_wx extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if($this->db->driverName === 'mysql')
        {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        $this->createTable('user_wx', [
            'id' => $this->primaryKey(),
            'openid' => $this->string()->notNull()->unique(),
            'user_id' => $this->integer()->notNull()->unique(),
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('user_wx');

    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170807_021444_create_table_user_wx cannot be reverted.\n";

        return false;
    }
    */
}
