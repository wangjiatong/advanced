<?php

use yii\db\Migration;

/**
 * Handles the creation of table `wx_user`.
 */
class m170809_082151_create_wx_user_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $tableOptions = null;
        if($this->db->driverName === 'mysql')
        {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        $this->createTable('wx_user', [
            'id' => $this->primaryKey(),
            'openid' => $this->string()->notNull(),
            'nickname' => $this->string()->notNull(),
            'sex' => $this->integer()->notNull(),
            'language' => $this->string()->notNull(),
            'city' => $this->string()->notNull(),
            'province' => $this->string()->notNull(),
            'country' => $this->string()->notNull(),
            'headimgurl' => $this->string()->notNull(),
        ], $tableOptions);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('wx_user');
    }
}
