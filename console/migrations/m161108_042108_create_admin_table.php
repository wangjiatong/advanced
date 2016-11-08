<?php

use yii\db\Migration;

/**
 * Handles the creation of table `admin`.
 */
class m161108_042108_create_admin_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('admin', [
            'id' => $this->primaryKey(),
            'username' => $this->string()->unique(),
            'email' => $this->string()->unique(),
            'password' => $this->string(),
            'auth' => $this->string(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('admin');
    }
}
