<?php

use yii\db\Migration;

class m170509_053907_create_table_user_access_log extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        $this->createTable('user_access_log', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull()->defaultValue(0)->comment('用户id'),
            'target_url' => $this->string()->notNull()->defaultValue('')->comment('所访问的url'),
            'query_params' => $this->text()->notNull()->defaultValue('')->comment('get和post参数'),
            'ua' => $this->string()->notNull()->defaultValue('')->comment('访问ua'),
            'ip' => $this->string()->notNull()->defaultValue('')->comment('访问ip'),
            'note' => $this->string()->notNull()->defaultValue('')->comment('json格式备注字段'),
            'created_time' => $this->timestamp()->notNull()->defaultValue('0000-00-00 00:00:00')->comment('访问时间'),
        ], $tableOptions);
    }

    public function down()
    {
        echo "m170509_053907_create_table_user_access_log cannot be reverted.\n";

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
