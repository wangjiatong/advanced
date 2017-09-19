<?php

use yii\db\Migration;

/**
 * Handles the creation of table `access_token`.
 */
class m170728_035245_create_access_token_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('access_token', [
            'id' => $this->primaryKey(),
            'access_token' => $this->string(512)->notNull()->defaultValue(''),
            'expires_in' => $this->integer()->notNull()->defaultValue(7200),
            'timestamp' => $this->timestamp(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('access_token');
    }
}
