<?php

use yii\db\Migration;

class m170509_053428_create_table_role_access extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        $this->createTable('role_access', [
            'id' => $this->primaryKey(),
            'role_id' => $this->integer()->notNull()->defaultValue(0)->comment('角色id'),
            'access_id' => $this->integer()->notNull()->defaultValue(0)->comment('权限id'),
            'created_time' => $this->timestamp()->notNull()->defaultValue('0000-00-00 00:00:00')->comment('创建时间'),
        ], $tableOptions);
    }

    public function down()
    {
        echo "m170509_053428_create_table_role_access cannot be reverted.\n";

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
