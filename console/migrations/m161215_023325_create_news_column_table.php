<?php

use yii\db\Migration;

/**
 * Handles the creation of table `news_column`.
 */
class m161215_023325_create_news_column_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('news_column', [
            'id' => $this->primaryKey(),
            'news_column' => $this->string(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('news_column');
    }
}
