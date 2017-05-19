<?php

use yii\db\Migration;

class m170509_044858_create_table_user_role extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        $this->createTable('user_role',
                [
                    'id' => $this->primaryKey(),//主键
                    'user_id' => $this->integer()->notNull()->defaultValue(0),//用户id
                    'role_id' => $this->integer()->notNull()->defaultValue(0),//角色id
                    'created_at' => $this->timestamp()->notNull()->defaultValue('0000-00-00 00:00:00'),//创建时间
                ], $tableOptions);
    }

    public function down()
    {
        echo "m170509_044858_create_table_user_role cannot be reverted.\n";

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
