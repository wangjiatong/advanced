<?php

use yii\db\Migration;

class m170509_043709_create_table_role extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        $this->createTable('role', [
            'id' => $this->primaryKey(),
            'role_name' => $this->string(20)->notNull()->defaultValue('')->unique(),
            'status' => $this->smallInteger(1)->notNull()->defaultValue(1),
            'created_at' => $this->timestamp()->notNull()->defaultValue('0000-00-00 00:00:00'),
            'updated_at' => $this->timestamp()->notNull()->defaultValue('0000-00-00 00:00:00'),
            ],$tableOptions);
    }

    public function down()
    {
        echo "m170509_043709_create_table_role cannot be reverted.\n";

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
