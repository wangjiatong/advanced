<?php

use yii\db\Migration;

/**
 * Handles the creation of table `equity_contract`.
 */
class m180227_044736_create_equity_contract_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        
        $this->createTable('equity_contract', [
            'id' => $this->primaryKey(),//主键
            'contract_number' => $this->string()->notNull()->unique(),//合同编号，唯一
            'source' => $this->integer()->notNull(),//销售
            'user_id' => $this->integer()->notNull(),//客户
            'capital' => $this->decimal(12, 2)->notNull(),//本金
            'transfered_time' => $this->date()->notNull(),//到账时间
            'found_time' => $this->date()->notNull(),//成立时间
            'bank' => $this->string()->notNull(),//开户行
            'bank_user' => $this->string()->notNull(),//开户名
            'bank_number' => $this->string()->notNull(),//银行卡号
            'product_id' => $this->integer()->notNull(),//产品
            
            'status' => $this->integer()->notNull(),//合同状态
            
            'pdf' => $this->string(),//确认函路径
            'interest_year' => $this->decimal(5, 2),//年利率
            'interest' => $this->decimal(10, 2),//利息
            
            //期限
            'predic_term_invest' => $this->integer(),//预计投资期
            'predic_term_extend' => $this->integer(),//预计延长期
            'predic_term_exit' => $this->integer(),//预计退出期
            
            'real_term_invest' => $this->integer(),//实际投资期
            'real_term_extend' => $this->integer(),//实际延长期
            'real_term_exit' => $this->integer(),//实际退出期
            
        ], $tableOptions);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('equity_contract');
    }
}
