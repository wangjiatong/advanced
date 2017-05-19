<?php

use yii\db\Migration;

class m170509_051335_create_table_access extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        $this->createTable('access', [
            'id' => $this->primaryKey()->comment('主键'),
            'access_name' => $this->string(50)->notNull()->defaultValue('')->unique()->comment('权限名称'),
            'urls' => $this->string(1000)->notNull()->defaultValue('')->comment('urls的json数组'),
            'status' => $this->smallInteger(1)->notNull()->defaultValue(1)->comment('状态：1=>有效 0=>无效'),
            'updated_time' => $this->timestamp()->notNull()->defaultValue('0000-00-00 00:00:00')->comment('更新时间'),
            'created_time' => $this->timestamp()->notNull()->defaultValue('0000-00-00 00:00:00')->comment('创建时间'),
            
        ], $tableOptions);
    }

    public function down()
    {
        echo "m170509_051335_create_table_access cannot be reverted.\n";

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
