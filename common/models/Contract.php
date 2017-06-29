<?php

namespace common\models;

use Yii;
use \yii\db\ActiveRecord;

/**
 * This is the model class for table "contract".
 *
 * @property integer $id
 * @property string $contract_number
 * @property integer $capital
 * @property string $transfered_time
 * @property string $found_time
 * @property integer $raise_day
 * @property integer $raise_interest
 * @property string $cash_time
 * @property integer $term_month
 * @property integer $interest
 * @property integer $term
 * @property string $every_time
 * @property string $every_interest
 * @property integer $total_interest
 * @property integer $total
 * @property string $bank
 * @property string $bank_number
 * @property string $source
 * @property string $created_at
 * @property string $updated_at
 * @property integer $product_id
 * @property integer $user_id
 * @property integer $status
 *
 * @property User $user
 * @property Product $product
 */
class Contract extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'contract';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
//            [['contract_number', 'capital', 'transfered_time', 'found_time', 'raise_day', 'raise_interest', 'cash_time', 'term_month', 'interest', 'term', 'every_time', 'every_interest', 'total_interest', 'total', 'bank', 'bank_number', 'product_id', 'user_id', 'interest_year', 'raise_interest_year', 'bank_user'], 'required'],
//            [['capital', 'raise_day', 'term_month', 'term', 'product_id', 'user_id'], 'integer'],
//            [['transfered_time', 'found_time', 'cash_time', 'created_at', 'updated_at'], 'safe'],
//            [['transfered_time', 'found_time', 'cash_time'], 'default', 'value' => null],//时间插件设置要求
//            [['contract_number', 'every_time', 'every_interest', 'bank', 'bank_number'], 'string', 'max' => 255],
//            [['contract_number'], 'unique'],
//            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => UserModel::className(), 'targetAttribute' => ['user_id' => 'id']],
//            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['product_id' => 'id']],
//            ['source', 'required'],
//            ['source', 'integer'],
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
            'term' => '付款频率',
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
            'raise_interest_year' => '募集期年利率（%）',
            'interest_year' => '年利率（%）',
            'pdf' => '合同扫描件',
            'bank_user' => '开户名',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Product::className(), ['id' => 'product_id']);
    }
    
    public function contractValidation($status)
    {
        switch ($status)
        {
            case 1: return '生效中';                break;
            case 0: return '已过期';                break;
            default : return '不存在的';
        }
    }
    
    public function getStatus()
    {
        switch ($this->status)
        {
            case 1: return '生效中';                break;
            case 0: return '已过期';                break;
            default : return '不存在的';
        }
    }
}
