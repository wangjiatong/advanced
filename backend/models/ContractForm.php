<?php

namespace backend\models;

use Yii;
use yii\base\Model;
//
use common\models\Product;
use common\models\UserModel;

class ContractForm extends Model
{
    public $contract_number;
    public $capital;
    public $transfered_time;
    public $found_time;
    public $cash_time;
    public $term_month;
    public $term;
    public $bank;
    public $bank_number;
    public $product_id;
    public $user_id;
    public $source;




    /**
     * @inheritdoc
     */
//    public static function tableName()
//    {
//        return 'contract';
//    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['contract_number', 'capital', 'transfered_time', 'found_time', 'cash_time', 'term_month', 'term', 'bank', 'bank_number', 'product_id', 'user_id'], 'required'],
            [['capital', 'term_month', 'term', 'product_id', 'user_id'], 'integer'],
            [['transfered_time', 'found_time', 'cash_time'], 'safe'],
            [['contract_number', 'bank', 'bank_number', 'source'], 'string', 'max' => 255],
            [['contract_number'], 'unique'],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => UserModel::className(), 'targetAttribute' => ['user_id' => 'id']],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['product_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '合同ID',
            'contract_number' => '合同编号',
            'capital' => '本金',
            'transfered_time' => '到账时间',
            'found_time' => '成立时间',
            'raise_day' => '募集天数',
            'raise_interest' => '募集期利息',
            'cash_time' => '兑付时间',
            'term_month' => '期限（月）',
            'interest' => '成立期利息',
            'term' => '分期（月）',
            'every_time' => '每期到期时间',
            'every_interest' => '每期应付利息',
            'total_interest' => '应付利息总额',
            'total' => '兑付总额',
            'bank' => '开户行',
            'bank_number' => '银行账号',
            'source' => '合同来源',
            'created_at' => '创建时间',
            'updated_at' => '修改时间',
            'product_id' => '产品名称',
            'user_id' => '客户姓名',
            'status' => '合同状态',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(UserModel::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Product::className(), ['id' => 'product_id']);
    }
}
